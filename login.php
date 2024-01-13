<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Ensakenitra_Events";

$link=mysqli_connect($servername, $username, $password, $dbname);

if (!$link) {
    die("Échec de la connexion à la base de données : " . mysqli_connect_error($link));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sub'])) {
    
    $_SESSION['login']=$_POST['email'];
    $_SESSION['password']=$_POST['pass'];
    $login = mysqli_real_escape_string($link, $_POST['login']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    $sql = "SELECT * FROM `organisateur` WHERE Mail_Org='$login';";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        if ($data && $password = $data['pass']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['login'] = $login;
            $_SESSION['pass'] = $pass;
            $_SESSION['nom_org'] = $data['nom_org'];
            $_SESSION['CIN_resp'] = $data['CIN_resp'];
            header('location: espace_organisation.php');
            exit;
        } else {
            
            echo "<h2>Votre login ou password est incorrect</h2>";
        }
    } else {
        die('Error: ' . mysqli_error($link));
    }
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: whitesmoke;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
            font-size: large;
            font-family: serif;
        }

        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-family: serif;
            font-size: large;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
            font-size: 15px;
        }
        p {
            font-family:serif;
        }

        a:hover {
            text-decoration: underline;
        }
        h2{
            font-family: serif;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>INSCRIPTION D'ORGANISATION</h2>
        <label for="email">Email:</label>
        <input type="text" name="email" placeholder="Enter your login">

        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter your password">

        <input  href="Espace organisation.php" style="margin-bottom: 10px;" type="submit" name="sub" value="Connexion">
        <input style="margin-top: 0px;" type="submit" name="sub" value="Retour à l'accueil">

        <p>Don't have an account? <a href="pages\organisateur\dem_org\form_org.html">Demande d'organisation</a></p>
    </form>
</body>
</html>