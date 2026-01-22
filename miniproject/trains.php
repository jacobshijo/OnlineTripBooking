<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookify | Train Search</title>

  <!-- favicon-->
  <link rel="shortcut icon" href="./images/company-logo.svg" type="image/svg+xml">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    .form-container {
      height: auto;
      width: 600px;
      background-color: #fff;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      border-radius: 10px;
      padding: 20px 30px;
      margin: 0 auto;
    }

    .title {
      text-align: center;
      font-family: "Lucida Sans", Geneva, Verdana, sans-serif;
      margin: 10px 0 30px 0;
      font-size: 28px;
      font-weight: 800;
    }

    .form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .form .input,
    .form select {
      border-radius: 20px;
      border: 1px solid #c0c0c0;
      padding: 12px 15px;
      width: 100%;
    }

    .form-btn {
      padding: 10px 15px;
      font-family: "Lucida Sans", Geneva, Verdana, sans-serif;
      border-radius: 20px;
      background: teal;
      color: white;
      cursor: pointer;
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      width: 100%;
    }

    .form-btn:active {
      box-shadow: none;
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
  if (!isset($_SESSION["username"])) {
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
          <div class="title">Train Booking</div>

          <form name="trainSearch" action="trainSearch.php" method="POST" class="form">

            <!-- Origin and Destination in same row -->
            <div class="flex-row">
              <div class="form-group">
                <label for="origin">Origin:</label>
                <select id="origin" name="origin" class="input" required>
                  <option value="" disabled selected>Select the origin</option>
                  <option value="New Delhi">New Delhi</option>
                  <option value="Howrah">Howrah</option>
                  <option value="Guwahati">Guwahati</option>
                  <option value="Silchar">Silchar</option>
                  <option value="Dimapur">Dimapur</option>
                </select>
              </div>

              <div class="form-group">
                <label for="destination">Destination:</label>
                <select id="destination" name="destination" class="input" required>
                  <option value="" disabled selected>Select the destination</option>
                  <option value="New Delhi">New Delhi</option>
                  <option value="Howrah">Howrah</option>
                  <option value="Guwahati">Guwahati</option>
                  <option value="Silchar">Silchar</option>
                  <option value="Dimapur">Dimapur</option>
                </select>
              </div>
            </div>

            <!-- Departure Date -->
            <div class="form-group">
              <label for="datetime1">Select Departure Date:</label>
              <input id="datetime1" type="date" name="date" class="input" required />
            </div>

            <script>
              const departureInput = document.getElementById("datetime1");

              // Set the minimum date to today's date
              const today = new Date().toISOString().split("T")[0]; // Format: YYYY-MM-DD
              departureInput.min = today;
            </script>

            <!-- Train Class -->
            <div class="form-group">
              <label for="class">Select Class:</label>
              <select id="class" name="class" class="input" required>
                <option value="" disabled selected>Select the Class</option>
                <option value="1AC">First AC</option>
                <option value="2AC">Second AC</option>
                <option value="3AC">Third AC</option>
                <option value="SL">Sleeper</option>
                <option value="CC">AC Chair Car</option>
              </select>
            </div>

            <!-- Number of Adults and Children -->
            <div class="flex-row">
              <div class="form-group">
                <label for="adults">No. of adults:</label>
                <select id="adults" name="adults" class="input" required>
                  <option value="" disabled selected>Select no. of adults</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>

              <div class="form-group">
                <label for="children">No. of children:</label>
                <select id="children" name="children" class="input" required>
                  <option value="" disabled selected>Select no. of children</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>
            </div>

            <!-- Hidden Day Field -->
            <input type="hidden" name="day" value="" id="dayTrain">

            <!-- Submit Button -->
            <div class="form-group text-center">
              <button type="submit" class="form-btn">Search Trains</button>
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
