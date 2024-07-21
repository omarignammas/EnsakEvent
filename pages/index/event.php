<?php 

include("connexion.php");
session_start();
if ($_SERVER['REQUEST_METHOD']=="POST") {
	$id=$_POST['submit'];
	$query="SELECT *FROM event WHERE id_event='$id'";
	$event=mysqli_query($link,$query);
	$data=mysqli_fetch_assoc($event);
	$start =new DateTime($data['debut']);
    $end =new DateTime($data['fin']);

	// Initialize the variable
	$eventTimeDisplay = '';

	if ($start->format('Y-m-d') === $end->format('Y-m-d')) {
	    // Start and end times are on the same day
	    $eventTimeDisplay = $start->format('M j, Y, g:i') . ' – ' . $end->format('g:i A');
	} else {
	    // Start and end times are on different days
	    $eventTimeDisplay = $start->format('M j, Y, g:i A') . ' – ' . $end->format('M j, Y, g:i A');
	}

	$now = new DateTime($data['deadline']); // current date and time

	// Compare the dates
	if ($now < $start) {
	    $past=0;
	} else {
	    $past=1;
	}

}else{
	header("location:index.php");
}


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>event</title>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
</head>
<body>

<?php include("navbar.php"); ?>
<br><br><br>

<!-- ___________________________________________________________________________ -->
<section class="bg-white py-10 text-center">
  <div class="container mx-auto px-4">
      <h1 class="text-5xl font-bold text-gray-900 leading-tight"><?=$data['titre'] ?></h1>
  </div>
</section>
<br><br>



<!-- ___________________________________________________________________________________________ -->

<div class="max-w-lg mx-auto">
<img class="w-full h-auto object-cover rounded-lg shadow-xl dark:shadow-gray-800" src="../organisateur/dem_event/images/<?=$data['img'] ?>" alt="image description"><br>
</div>
<!-- _____________________________________________________________________________________________ -->


<section class="bg-gray-100 py-12">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap justify-center text-center">
      <div class="w-full lg:w-2/3 px-4">
        <h2 class="text-4xl font-bold text-gray-800">About This Event</h2>
        <p class="mt-4 text-lg text-gray-600"><?=$data['detail'] ?></p>
      </div>
    </div>
  </div>
</section>


<br><br><hr>


<!-- ________________________________________________________________________ -->

<div class="bg-gray-100 p-4 text-center">
  <div class="container mx-auto">
    <div class="flex justify-between items-center flex-wrap">
      <div class="text-lg text-gray-700 font-semibold">
        <span><?=$eventTimeDisplay ?></span>
      </div>
      <?php 
if (!$past) {

?>
      <a href="#rsvp">
        <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Register NOW</button>
        </a>
    <?php }?>
    </div>
  </div>
</div>
<?php 
if (!$past) {

?>
<section id="rsvp"class="container mx-auto p-4">
<form method="post" action="register.php" >
	<input type="text" class="hidden" name="id_event" value="<?=$data['id_event'] ?>">
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="prenom_pnt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
            <input type="text" name="prenom_pnt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
        </div>
        <div>
            <label for="nom_pnt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
            <input type="text" name="nom_pnt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
        </div>
    <div >
	<label for="profil_pnt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profil</label>
	<select name="profil_pnt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
	  <option selected>select a profil</option>
	  <option value="cp">CP student</option>
	  <option value="ci">CI student</option>
	  <option value="master">Matser student</option>
	  <option value="prof">Professor</option>
	  <option value="other">other</option>
	</select>  

</div>
        
    <div class="mb-6">
        <label for="mail_pnt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
        <input type="email" name="mail_pnt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required>
    </div> 
    <div>
   <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Register</button>
   </div>
</form>
</section>
<br><br>

<?php }?>

<br><br>
<section  class="bg-gray-100 py-12">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap justify-center text-center">
      <div class="w-full lg:w-2/3 px-4">
        <h2 class="text-4xl font-bold text-gray-800">Location</h2><br><br>
        <div id="map"class="bg-gray-100 py-12 h-96 w-full md: lg:w-3/4 xl:w-1/2 mx-auto"></div>
      </div>
    </div>
  </div>
</section>

<!-- Include Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
  // Function to initialize the map and add a marker
  function initMap() {
    // Coordinates for ENSA Kenitra
    var ensaKenitra = [34.2540503, -6.5890166];

    // Create the map
    var map = L.map('map').setView(ensaKenitra, 15);

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Add a marker to the map at the position of ENSA Kenitra
    L.marker(ensaKenitra).addTo(map);
  }

  // Call the function to initialize the map
  initMap();
</script>



<!-- ______________________________________________________________________________________________ -->
<?php include("footer.php"); ?>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>