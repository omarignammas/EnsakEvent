<?php 
  include("includes/connexion.php");
   mysqli_close($link); 
   header("location:login.php");
?>