<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookify | Flight Search</title>

  <!-- favicon-->
  <link rel="shortcut icon" href="./images/company-logo.svg" type="image/svg+xml">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <style>
    /* From Uiverse.io by akshat-patel28 */ 
    .form-container {
      height: 500px;
      width: 600px;
      background-color: #fff;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      border-radius: 10px;
      box-sizing: border-box;
      padding: 20px 30px;
      margin: 0 auto; /* Centering the form */
    }

    .title {
      text-align: center;
      font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
      margin: 10px 0 30px 0;
      font-size: 28px;
      font-weight: 800;
    }

    .form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .form .input, .form select {
      border-radius: 20px;
      border: 1px solid #c0c0c0;
      outline: 0 !important;
      padding: 12px 15px;
      width: 100%;
    }

    .radioContainer {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
    }

    .form-btn {
      padding: 10px 15px;
      font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
      border-radius: 20px;
      border: 0 !important;
      outline: 0 !important;
      background: teal;
      color: white;
      cursor: pointer;
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      width: 100%;
    }

    .form-btn:active {
      box-shadow: none;
    }

    .form-group {
      width: 100%;
    }

    .flex-row {
      display: flex;
      justify-content: space-between;
      gap: 15px;
    }

    .flex-row .form-group {
      flex: 1;
    }

    @media (max-width: 768px) {
      .form-container {
        width: 90%;
      }
    }
  </style>
</head>

<body id="top">

  <!-- Header -->
  <?php
    if(!isset($_SESSION["username"])) {
      include("header/headerLoggedOut.php");
    } else {
      include("header/headerLoggedIn.php");
    }
  ?>

  <main>
    <article>
      <!-- Hero Section -->
      <section class="hero" id="about-us">
        <!-- Form Section -->
        <div class="form-container">
          <div class="title">Cab Booking</div>

          <form name="flightSearch" action="" method="POST" class="form">
            
            <!-- Origin and Destination in same row -->
            <div class="flex-row">
              <div class="form-group">
              <label for="origin">Select Location:</label>
                <input type="text" name="origin" id="origin" class="input" required>
              </div>

              <div class="form-group">
              <label for="destination">Select Destination:</label>
                <input type="text" name="destination" id="destination" class="input" required>
              </div>
            </div>

            <!-- Departure Date in a separate row -->
            <div class="form-group">
              <label for="date">Select Date:</label>
              <input id="date" type="date" name="date" class="input" required />
            </div>

            <script>
              const departureInput = document.getElementById("datetime1");

              // Set the minimum date to today's date
              const today = new Date().toISOString().split("T")[0]; // Format: YYYY-MM-DD
              departureInput.min = today;
            </script>

            <div class="form-group">
              <label for="time">Select Time:</label>
              <input id="time" type="time" name="time" class="input" required />
            </div>

            <div class="flex-row">
              <div class="form-group">
                <label for="adults">No. of persons:</label>
                <select id="adults" name="adults" class="input" required>
                  <option value="" disabled selected>Select the no. of persons</option> <!-- Disabled default option -->
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>

            </div>

            <div class="form-group text-center">
              <button type="submit" class="form-btn">Search Cabs</button>
            </div>
          </form>
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
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
