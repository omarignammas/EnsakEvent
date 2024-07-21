
<?php 

include("connexion.php");

// Check if the 'message' GET parameter is set



$query="SELECT * FROM event WHERE deadline >= CURDATE() AND checked=1 ORDER BY deadline ASC";
$upevent=mysqli_query($link,$query);

$query="SELECT * FROM event WHERE deadline < CURDATE() AND checked=1 ORDER BY deadline ASC";
$psevent=mysqli_query($link,$query);

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/png" href="/path-to-your-favicon/favicon.png">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
	<title>index</title>
</head>
<body>

<?php include("navbar.php"); ?>
<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="public/amphi_rouge.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="public/amphi1.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="public/batB.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="public/fontaine.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="public/fontaine.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>


<!-- ______________________________________________________________________________________________________________________________________________________________ -->


<section id="about" class="bg-gray-100 py-12">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap justify-center text-center">
      <div class="w-full lg:w-2/3 px-4">
        <h2 class="text-4xl font-bold text-gray-800">About Us</h2>
        <p class="mt-4 text-lg text-gray-600"><br>
          Welcome to ENSAK Event Platform – the gateway to a vibrant community of science and technology enthusiasts. Our mission is to foster a dynamic environment where students, faculty, and industry professionals can come together to share knowledge, celebrate innovation, and build connections.<br><br>

Hosted in the heart of ENSA Kenitra, our platform is designed to streamline your event experience from start to finish. Whether you're looking to network, collaborate, or just explore the latest in applied sciences, ENSAK Event is your all-access pass to the happenings within our esteemed institution.<br><br>

Participants can look forward to a diverse lineup of workshops, seminars, and conferences tailored to spark curiosity and ignite new ideas. With an intuitive interface and a focus on user experience, our website ensures that you stay informed about upcoming events, effortlessly register your participation, and engage with the ENSA community.<br><br>

Join us as we embark on a journey of discovery, learning, and growth. ENSAK Event isn't just a platform; it's where the future of science and technology comes to life. Be a part of our story and make your mark at the forefront of innovation.<br><br>
        </p>
      </div>
    </div>
  </div>
</section>




<br><br><hr>


<!-- ______________________________________________________________________________ -->

<section class="bg-gray-100 py-12 text-center">

<h2 class="text-4xl font-bold text-gray-800">Upcoming Events</h2><br><br>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 flex flex-wrap justify-between -mx-2">
<?php 
for ($i=0; $i <3 && $i<mysqli_num_rows($upevent) ; $i++) { 
	$data=mysqli_fetch_assoc($upevent);

?>
<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
 
        <img class="rounded-t-lg  w-full h-80rounded-t-lg  w-full h-80"  src="../organisateur/dem_event/images/<?=$data['img'] ?>" alt="" />

    <div class="p-5">
 
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?=$data['titre'] ?></h5>

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

<a href="upcoming.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Load more</a>


</section>

<br><br><hr>

<!-- ____________________________________________________________________________________________________________________________________________ -->

<section class="bg-gray-100 py-12 text-center">

<h2 class="text-4xl font-bold text-gray-800">Past Events</h2><br><br>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 flex flex-wrap justify-between -mx-2">
<?php 
for ($i=0; $i <3 && $i<mysqli_num_rows($psevent) ; $i++) { 
	$data=mysqli_fetch_assoc($psevent);

?>
<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
  
        <img class="rounded-t-lg  w-full h-80" src="../organisateur/dem_event/images/<?=$data['img'] ?>" alt="" />

    <div class="p-5">
   
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?=$data['titre'] ?></h5>

        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?=$data['descp'] ?></p>
        <form method="post" action="event.php">
        <button type="submit" name="submit" value="<?=$data['id_event'] ?>" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Read more</button>
        </form>
    </div>	
</div>

<?php } ?>

</div>
<br><br>

<a href="past.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Load more</a>


</section>

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



<?php include("footer.php"); ?>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>
