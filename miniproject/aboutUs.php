<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookify | About Us</title>

  <!-- favicon-->
  <link rel="shortcut icon" href="./images/company-logo.svg" type="image/svg+xml">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">

<style>
  p {
    line-height: 180%;
  }
</style>

</head>

<body id="top">

  <!-- Header -->
  <?php
    if(!isset($_SESSION["username"])) {
      include("header/headerLoggedOut.php");
    }
    else {
      include("header/headerLoggedIn.php");
    }
  ?>

  <main>
    <article>
      <!-- Hero Section -->
      <section class="hero" id="about-us">
        <div class="container">
          <h2 class="h1 hero-title">About Us</h2>
          <p class="hero-text">
            Welcome to Bookify! Your one-stop solution for booking hotel rooms, flights, and train tickets. Our mission
            is to make travel planning seamless, affordable, and enjoyable.
          </p>
        </div>
      </section>

	  <div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->
	  <div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->

      <!-- Our Story Section -->
      <section class="about-story">
        <div class="container">
          <h2 class="h2 section-title">Our Story</h2>
          <p>At <strong>Bookify</strong>, we’re not just about booking tickets or finding a place to stay—we’re about creating unforgettable travel experiences. We know that travel is personal, and the way you get to your destination matters just as much as where you're going. That’s why we’ve built a platform that lets you easily compare flights, trains, and hotels to craft the perfect trip, whether you're traveling for business, leisure, or a little bit of both.</p>
<p>We’re a team of travelers at heart who believe the world is best explored one journey at a time. From the convenience of flying to the scenic beauty of train travel, we’ve designed <strong>Bookify</strong> to cater to every traveler’s needs and preferences.</p>

        </div>
      </section>

	  <div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->
	  <div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->

      <!-- Mission & Vision Section -->
      <section class="mission-vision">
        <div class="container">
          <div class="mission">
		  <h2 class="h2 section-title">Our Mission</h2>
            <p>Booking your next trip should be simple—and with <strong>Bookify</strong>, it is. Our platform gives you the flexibility to choose the best way to travel, whether you're in the air, on the rails, or settling into your ideal accommodation. Here’s what we offer:</p>
<ul>
	<li><strong>Flights</strong>: Compare hundreds of airlines to find the best deals on flights, whether you’re traveling domestically or internationally. With easy-to-use filters, you can quickly find the flight that fits your schedule and budget.</li>
	<li><strong>Trains</strong>: Enjoy the scenic route with train travel options that let you sit back, relax, and watch the world go by. We help you find and book train tickets for domestic and international journeys, so you can travel comfortably and in style.</li>
	<li><strong>Hotels</strong>: From cozy boutique hotels to luxurious resorts, discover the perfect place to stay. Our curated selection of hotels ensures that you’ll find an accommodation that fits your taste, budget, and travel style.</li>
</ul>

          </div>

		  <div class="spacerLarge"><br></div> <!-- just a dummy class for creating some space -->
		  <div class="spacerLarge"><br></div> <!-- just a dummy class for creating some space -->

          <div class="vision">
		  <h2 class="h2 section-title">Our Promise</h2>
            <p>At <strong>Bookify</strong>, we’re more than just a booking site—we’re your travel partner. We’re committed to making your travel experience as smooth, enjoyable, and stress-free as possible. Whether you’re jetting off to a faraway destination, enjoying the comfort of a train journey, or staying at a hotel that feels like home, we’re here to help you travel the way you want.</p>


          </div>
        </div>
      </section>

	  <div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->
	  

      <!-- Team Section -->
      <section class="team">
        <div class="container">
          
          <p>Thank you for choosing <strong>Bookify</strong>—your next adventure is just a click away.</p>

        </div>
      </section>
    </article>
  </main>

  <div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->
  <div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->

  <!-- Footer -->
  <?php include("header/footer.php"); ?>

  <!-- Back to Top -->
  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>

  <!-- Custom JavaScript -->
  <script src="./assets/js/script.js"></script>

  <!-- Ionicons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
