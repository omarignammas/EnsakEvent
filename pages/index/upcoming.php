
<?php 

include("connexion.php");

$query="SELECT * FROM event WHERE  deadline >= CURDATE()  AND checked=1 ORDER BY deadline ASC";
$upevent=mysqli_query($link,$query);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upcoming</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
<?php include("navbar.php"); ?>

<section class="bg-gray-100 py-12 text-center">

<h2 class="text-4xl font-bold text-gray-800">Upcoming Events</h2><br><br>
<div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 flex flex-wrap justify-between -mx-2">
<?php 
while ($data=mysqli_fetch_assoc($upevent)) {

?>
<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg  w-full h-80rounded-t-lg  w-full h-80"  src="../organisateur/dem_event/images/<?=$data['img'] ?>" alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?=$data['titre'] ?></h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?=$data['descp'] ?></p>
        <form method="post" action="event.php">
        <button type="submit" name="submit" value="<?=$data['id_event'] ?>" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Read more</button>
        </form>
    </div>
</div>

<?php } ?>
<br><br>
</div>
<br><br>
</section>




<?php include("footer.php"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>