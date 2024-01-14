<?php
include ("../../../includes/connexion.php");


  $id = isset($_POST["id"]) ? $_POST["id"] : "";
  if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['envoyer'])) {
    // Récupérer les données du formulaire
    $email =$_POST["email"];
    $password=rand(10000000, 99999999);
    $message=$_POST['message'];

    $_SESSION['login']=$_POST["email"];  
    $_SESSION['password']=$password;

    $da="SELECT * FROM demande_org WHERE Mail_Org='$email'";
    $re=mysqli_query($conn,$da);

    //stocker dans un tab;
    $data=mysqli_fetch_assoc($re);
    
    //lorsue j'accepte la demande d'etre organisateur je le stocker dans la table organisateur
    $dn = "INSERT INTO organisateur (mail_org ,pass, nom_org, type, about, nom_rep, prenom_rep, cin , gsm) VALUES ('{$data['Mail_Org']}', NULL ,'{$data['Nom_Org']}', '{$data['Type_Org']}', '{$data['Description']}', '{$data['Nom_resp']}', '{$data['Prenom_resp']}', '{$data['CIN']}','{$data['GSM']}')";
    mysqli_query($conn, $dn);

    $dt="DELETE FROM demande_org  WHERE  Mail_Org = '$email'";
    mysqli_query($conn,$dt);
  

    if(filter_var($email,FILTER_VALIDATE_EMAIL)){

        $SQL="SELECT * FROM organisateur WHERE Mail_Org = '$email'";
        $req=mysqli_query($conn,$SQL);

        if(mysqli_num_rows($req)>0){
 
            // Sujet de l'e-mail
            $sujet = "Creation du votre compte d'organisateur a ete bien validee :";
        

            // En-têtes de l'e-mail
            $headers = "From: Ensakenitraadm@gmail.com\r\n";
            $headers .= "Reply-To: $email\r\n";


            // Corps de l'e-mail
            $corps = "$message\n";
            $corps .= "Email: $email\n";
            $corps .= "Mot de passe:$password";

        
            // Envoyer l'e-mail
            if (mail($email, $sujet, $corps, $headers)) {
                $sql2="UPDATE organisateur SET pass='$password'";
                $res=mysqli_query($conn,$sql2);
                if($res){
                    header('location:..\dem_org_reçu\cheekorg.html');
                }else
                    echo 'veuillez ressayer';
               
            }
        }
   
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>compte Envoyée</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .verification-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }

        h2 {
            color: #56d152;
        }

        p {
            font-family: serif;
            font-size: larger;
            color: #555;
        }

        .home-link1 {
            display: block;
            margin-top: 20px;
            margin-bottom: 5px;
            width: 100%;
            text-decoration: none;
            background-color: #3498db;
            color: #fff;
            padding: 14px;
            border-radius: 6px;
            border-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            font-family: sans-serif;
            font-weight: bold;
            font-size: 1rem;
        }
        label {
            display: block;
            margin: 15px 0 5px;
            text-align: left;
            font-family: serif;
            font-size: medium;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .home-link1:hover {
            background-color: #2980b9;
        }
        
        .home-link2 {
            display: block;
            margin-top: 10px;
            width: 93%;
            margin-bottom: 20px;
            text-decoration: none;
            background-color: #3498db;
            color: #fff;
            padding: 14px;
            border-radius: 6px;
            border-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            font-family: sans-serif;
            font-weight: bold;
            font-size: 1rem;
        }

        .home-link2:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
    <div class="verification-container">
        <img src="..\photo1/valide.jpg" alt="Envoyée" height="60" width="60">
        <h2>Le compte d'organisation a été Cre&eacute; avec succès !</h2>
        <label for="email">Entrer L'email de l'organisation :</label>
        <input type="email" name="email"  value="<?php echo $id ?>" placeholder="<?php echo $id ?>">
        <p>Entrer un message a l'organisation :</p>
        <label for="message"></label>
        <input type="text" name="message" placeholder="Tapez votre message">
        <button type="submit" name="envoyer"  class="home-link1">Envoyer Le compte organisateur</button> 

        <a href="..\dem_org_reçu\form_org_reçu.php" class="home-link2">Retour à Espace d'administration</a>
    </div>
    </form>
</body>
</html>