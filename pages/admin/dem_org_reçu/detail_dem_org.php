<?php 
include ("../../../includes/connexion.php");
include("../../../navbar_admin.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['valider'])) {
    $mail_id= isset($_POST["mail-id"]) ? $_POST["mail-id"] : "";
  } 
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../../../assets/fonts/fontawesome-all.min.css">
    <style>
    /* Styles CSS personnalisés pour le tableau */
    thead .card-header th {
        text-align: center;
    }

    thead .card-header th {

        text-align: center;
    }

    thead .card-header th.text-primary {
        text-align: center;
    }

#btp1{
padding: 10px;
}
 

.container {
    padding: 20px;
    width: 600px;
    text-align: center;
    border:3px solid #3498db;
    border-radius:7px;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.3);

}

label {
    display: block;
    margin: 15px 0 5px;
    text-align: left;
    font-family: 'Poppins', sans-serif;  
    font-weight: bold;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
    border: 1px solid #ccc;
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
textarea {
    width: 100%;
    padding: 20px;
    margin-bottom: 15px;
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
    border: 1px solid #ccc;
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.input{
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    background: rgba(255, 255, 255, 0.2);
}

button {
    background-color: #3498db;
    margin-left:6%;
    color: #fff;
    cursor: pointer;
    padding: 10px;
    width: 25%;
    border: none;
    border-radius: 4px;
    font-weight: bold;
    font-family: 'Poppins', sans-serif;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);

}

button:hover {
    background-color: #2980b9;
}
td{
        vertical-align: middle;
    }
    
</style>
</head>
<body id="page-top">
    <div id="wrapper">
         <?php  nav_bar(1,'../../../'); ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                
                <!-- Tableau init-->
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Espace Admin </h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Demande Evenement</p>
                            
                        </div>
                        <div class="card-body">

        
                        <form action="" method="POST" enctype="multipart/form-data">
        <?php

        $sql = "SELECT * FROM demande_org WHERE Mail_Org='$mail_id' ";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $eventDetails = mysqli_fetch_assoc($result);
        }
            ?>
                <label>Mail d'organisation:</label>
                <input type="text" value="<?php echo $eventDetails['Mail_Org']; ?>" readonly>

                <label>Nom d'organisation:</label>
                <input type="text" value="<?php echo $eventDetails['Nom_Org']; ?>" readonly>

                <label>Type d'organisation:</label>
                <input type="text" value="<?php echo $eventDetails['Type_Org']; ?>" readonly>

                <label>Description:</label>
                <textarea  name="desc" required readonly><?php echo $eventDetails['Description']; ?></textarea>

                <label>Nom Responsable:</label>
                <input type="text" value="<?php echo $eventDetails['Nom_resp']; ?>" readonly>
                
                <label>Prenom Responsable:</label>
                <input type="text" value="<?php echo $eventDetails['Prenom_resp']; ?>" readonly>

                <label>Cin du responsable:</label>
                <input type="text" value="<?php echo $eventDetails['CIN']; ?>" readonly>

                <label>GSM:</label>
                <input type="text" value="<?php echo $eventDetails['GSM']; ?>" readonly>


                <div class="mb-3"></div>
</form>

     <div class="" style='margin-left:400px'>
    <form action="trait_org_reçu.php" methode='GET'>
    <input type='hidden' name='id' value="<?php echo $eventDetails['Mail_Org']; ?>">
    <button type="submit" name="action" value="Accepter" class='btn btn-success btn-sm ms-2 text-white d-inline-block p-2 ' id='btp2'>Valider</button>
    </form>
    </div>

                        
                    </div>
                </div>
            </div>
            <?php include('../../../footer.html') ?>
       
    </div>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/bs-init.js"></script>
    <script src="../../../assets/js/theme.js"></script>
</body>

</html>