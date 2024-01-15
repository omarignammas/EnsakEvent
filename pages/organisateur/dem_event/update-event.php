<?php
include ("../../../includes/connexion.php");
if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submit'])){
    // Récupérer les données du formulaire
   
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $titre = mysqli_real_escape_string($conn, $_POST['titre']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $gsm = mysqli_real_escape_string($conn, $_POST['gsm']);
    $datedebut = mysqli_real_escape_string($conn, $_POST['datedebut']);
    $datefin = mysqli_real_escape_string($conn, $_POST['datefin']);
    $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
    $detail = mysqli_real_escape_string($conn, $_POST['detail']);
    $local = mysqli_real_escape_string($conn, $_POST['local']);

    $id=$_SESSION['id'];
    
    // Télécharger l'image
    if(isset($_FILES['fichier']) and $_FILES['fichier']['error']==0){
        $dossier='images/';
        $temp_name=$_FILES['fichier']['tmp_name'];
        if(!is_uploaded_file($temp_name)){
            exit("le fichier est introuvable!");
        }
    if($_FILES['fichier']['size']>=10000000){
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
    
}}
$query="UPDATE `event` SET `titre`='$titre',`type`='$type',`detail`='$detail',`debut`='$datedebut',`fin`='$datefin',`local`='$local',`img`='$nom_photo',`descp`='$description',`deadline`='$deadline',`gsm`='$gsm',`checked`=3 WHERE `id_event`='$id'";
$result=mysqli_query($conn,$query);
if($result){
?>
<script type="text/javascript">
    alert("Vos données sont biens enregistrées");
</script>
<?php 
header('location: etat-form-event.php');
}else{
?>
<script type="text/javascript">
    alert("Erreur lors d'enregistrement de vos données ! ");
</script>
<?php
    header('location: form-prom.php?modifier=True');
}
?>