<?php 

$host="localhost";
$db_user="root";
$db_pass="";
$db_name="ensakenitra_events";

$link=mysqli_connect($host,$db_user,$db_pass,$db_name);
if (!$link) {
	die("Echec de connexion ".mysqli_connect_error());
}

?>