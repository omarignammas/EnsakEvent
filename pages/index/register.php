<?php 
include("connexion.php");
if ($_SERVER['REQUEST_METHOD']=="POST") {
	$id_event=$_POST['id_event'];
	$nom_pnt=$_POST['nom_pnt'];
	$prenom_pnt=$_POST['prenom_pnt'];
	$profil_pnt=$_POST['profil_pnt'];
	$mail_pnt=$_POST['mail_pnt'];
	$query="SELECT *FROM participant WHERE mail_pnt='$mail_pnt' AND id_event='$id_event' ";
	$event=mysqli_query($link,$query);
	$n=mysqli_num_rows($event);

	if (!$n) {
		$query="INSERT INTO participant (mail_pnt,nom_pnt,prenom_pnt,profil_pnt,id_event) values ('$mail_pnt','$nom_pnt','$prenom_pnt','$profil_pnt','$id_event')";
		$checked=mysqli_query($link,$query);

		echo "<script type='text/javascript'>alert('Your participation has been done successfully!');</script>";
		header("Location:index.php");
    	exit;
	} else{
		echo "<script type='text/javascript'>alert('Already existing participant!');</script>"; 
		header("Location:index.php");
		exit;
	}

}
?>

