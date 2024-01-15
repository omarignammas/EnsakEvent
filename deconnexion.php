<?php 
  include("includes/connexion.php");
   session_destroy();
   mysqli_close($conn); 
   header("location:login.php");
?>

