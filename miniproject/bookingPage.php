<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookify | Bookings</title>

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
    /* Booking Options Section */
    .popularDestinationsContainer {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 2rem;
    }

    .destinationHolder {
      width: 100%;
      max-width: 1200px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .destinationQuote {
      font-size: 1.8rem;
      color: white;
      margin-bottom: 2rem;
      text-align: center;
    }

    .containerGrids {
  display: flex;
  flex: 1;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  margin: 0 1rem;
  text-decoration: none;
  /* background-color: #333; Dark background for contrast */
  border-radius: 12px; /* Increased for a smoother look */
  padding: 2rem; /* Increased padding for larger size */
  transition: transform 0.3s ease, background-color 0.3s ease;
  width: 200px; /* Increase width */
  height: 200px; /* Increase height */
}


    .containerGrids:hover {
      transform: scale(1.05);
      background-color: #555;
    }

    .iconsDim {
  width: 96px; /* Increased icon width */
  height: 96px; /* Increased icon height */
  margin-bottom: 1rem;
}

.heading {
  font-size: 1.5rem; /* Increased font size */
  color: white;
  font-weight: 600;
  text-align: center;
}

    .booking-options {
      display: flex;
      justify-content: center;
      gap: 2rem;
      flex-wrap: wrap; /* Ensure responsiveness */
    }

    @media (max-width: 768px) {
      .booking-options {
        flex-direction: column;
      }
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
          <h2 class="h1 hero-title">Booking</h2>
          <!-- Booking Options -->
          <div class="col-xs-12 popularDestinationsContainer">
            <div class="col-xs-12 destinationHolder">
              <div class="col-xs-12 destinationQuote">What would you like to book today?</div>
              <div class="col-xs-12 booking-options">
                <a href="hotels.php" class="containerGrids">
                  <div class="icons">
                    <img src="images/icons/hotel.png" alt="hotels" class="iconsDim" />
                  </div>
                  <div class="heading">Hotels</div>
                </a>

                <a href="flights.php" class="containerGrids">
                  <div class="icons">
                    <img src="images/icons/flight.png" alt="flights" class="iconsDim" />
                  </div>
                  <div class="heading">Flights</div>
                </a>

                <a href="trains.php" class="containerGrids">
                  <div class="icons">
                    <img src="images/icons/train.png" alt="trains" class="iconsDim" />
                  </div>
                  <div class="heading">Trains</div>
                </a>

                <a href="cab.php" class="containerGrids">
                  <div class="icons">
                    <img src="images/icons/train.png" alt="cabs" class="iconsDim" />
                  </div>
                  <div class="heading">Cabs</div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </article>
  </main>

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
