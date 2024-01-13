<?php
include ("../../../includes/connexion.php");
if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submit'])){
// Récupérer les données du formulaire
$nom_org =  $_POST['nom_org'];
$Email =$_POST['email_org'];
$description =$_POST['description'];
$titre = $_POST['titre'];
$type = $_POST['type'];
$gsm = $_POST['gsm'];
$datedebut = $_POST['datedebut'];
$datefin = $_POST['datefin'];
$deadline = $_POST['deadline'];
$detail = $_POST['detail'];
$lieu = $_POST['lieu'];

// Télécharger l'image
if(isset($_FILES['fichier']) and $_FILES['fichier']['error']==0){
    $dossier='photo/';
    $temp_name=$_FILES['fichier']['tmp_name'];
    if(!is_uploaded_file($temp_name)){
        exit("le fichier est introuvable!");
    }
if($_FILES['fichier']['size']>=1000000){
     exit("Erreur,fichier stockage ");
}
$infosfichier=pathinfo($_FILES['fichier']['name']);
$extension_upload=$infosfichier['extension'];

$extension_upload=strtolower($extension_upload);
$extension_autorities=array('png','jpeg','jpg');

if(!in_array($extension_upload,$extension_autorities)){
    exit("Erreur,Veuillez inserer une image svp (extentions autorisee png)");
}
$nom_photo=$nom_org.".".$extension_upload;
if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
    exit("<h2>Probleme dans telechargement de l'image,Ressayer!</h2>");
}

}
// Insérer les données dans la base de données
    $sql = "INSERT INTO event (mail,nom_org,titre,descp, type, debut, fin, local, img, deadline,detail, gsm,)
        VALUES ('$Email','$nom_org','$titre','$description', '$type', '$datedebut', '$datefin','$lieu','$nom_photo','$deadline', '$detail', '$gsm')";

if ($conn->query($sql) === TRUE) {
    header('location:promotion_envoyer.html');
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}
}    

$conn->close();
?>