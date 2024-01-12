<?php
include ("../../../includes/connexion.php");

// Récupérer les données du formulaire
$email = $_POST['email'];
$nom_org = $_POST['nom_org'];
$type = $_POST['type'];
$description = $_POST['description'];
$nom_resp = $_POST['nom_resp'];
$prenom_resp = $_POST['prenom_resp'];
$cin_resp = $_POST['cin_resp'];



$sql = "INSERT INTO demande_org (Mail_Org, Nom_Org ,Type_org, Description, Nom_resp, Prenom_resp, CIN ) VALUES ('$email','$nom_org', '$type', '$description', '$nom_resp', '$prenom_resp', '$cin_resp')";
$result=mysqli_query($conn,$sql);
if ($result){
    header("location:verification.html");
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}


mysqli_close($conn);
?>

