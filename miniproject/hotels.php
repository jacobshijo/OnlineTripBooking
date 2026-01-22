<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookify | Hotel Search</title>

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
      box-sizing: border-box;
      padding: 20px 30px;
      margin: 0 auto;
    }

    .title {
      text-align: center;
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
      padding: 12px 15px;
      width: 100%;
    }

    .form-btn {
      padding: 10px 15px;
      border-radius: 20px;
      border: 0;
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

    .room-details {
      margin-top: 20px;
    }

    @media (max-width: 768px) {
      .form-container {
        width: 90%;
      }
    }

    .room-details {
      margin-top: 20px;
      overflow: hidden;
      opacity: 0;
      height: 0;
      transition: height 0.5s ease, opacity 0.5s ease;
    }

    .room-details.expanding {
      opacity: 1;
      height: auto; /* Will be dynamically calculated */
    }

    .fade-in {
      opacity: 0;
      transform: translateY(10px);
      animation: fadeIn 0.5s ease forwards;
    }

    @keyframes fadeIn {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

  </style>
</head>

<body id="top">

<header>
  <!-- Header -->
  <?php
    if (!isset($_SESSION["username"])) {
      include("header/headerLoggedOut.php");
    } else {
      include("header/headerLoggedIn.php");
    }
  ?>
</header>

  <main>
    <article>
      <section class="hero" id="about-us">
        <div class="form-container">
          <div class="title">Hotel Booking</div>

          <form name="hotelSearch" action="hotelSearch.php" method="GET" class="form">
            <div class="form-group">
              <label for="city">City:</label>
              <select id="city" class="input" name="city" required>
                <option value="" disabled selected>Select the city</option>
                <option value="Kerala">Kerala</option>
                <option value="New Delhi">New Delhi</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Kolkata">Kolkata</option>
                <option value="Bengaluru">Bengaluru</option>
                <option value="Pune">Pune</option>
                <option value="Chennai">Chennai</option>
                <option value="Guwahati">Guwahati</option>
                <option value="Manali">Manali</option>
                <option value="Shillong">Shillong</option>
              </select>
            </div>

            <div class="form-group">
              <label for="datetime5">Select Check-in Date:</label>
              <input id="datetime5" type="date" name="checkIn" class="input" required />
            </div>

            <div class="form-group">
              <label for="datetime6">Select Check-out Date:</label>
              <input id="datetime6" type="date" name="checkOut" class="input" required />
            </div>

            <script>
              const checkInInput = document.getElementById("datetime5");
              const checkOutInput = document.getElementById("datetime6");

              checkInInput.addEventListener("change", function () {
                const checkInDate = this.value;
                checkOutInput.min = checkInDate; // Set the minimum check-out date to the selected check-in date
              });
            </script>

            <div class="form-group">
              <label for="rooms">No. of rooms:</label>
              <select id="rooms" name="rooms" class="input" required>
                <option value="" disabled selected>Select the no. of rooms</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>

            <div id="room-details" class="room-details"></div>

            <div class="form-group text-center">
              <button type="submit" class="form-btn">Search Hotels</button>
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

  <!-- JavaScript -->
  <script>
    document.getElementById("rooms").addEventListener("change", function () {
      const roomDetails = document.getElementById("room-details");
      roomDetails.innerHTML = ""; // Clear existing fields
      const numRooms = parseInt(this.value);

      // Reset styles for height and opacity
      roomDetails.style.height = "0px";
      roomDetails.style.opacity = "0";

      // Temporarily set the height to auto to calculate required space
      const tempDiv = document.createElement("div");
      tempDiv.style.visibility = "hidden";
      roomDetails.appendChild(tempDiv);
      for (let i = 1; i <= numRooms; i++) {
        const roomDiv = document.createElement("div");
        roomDiv.className = "form-group";
        roomDiv.innerHTML = `
          <label for="room${i}">No of persons - Room ${i}:</label>
          <select id="room${i}" name="room${i}" class="input" required>
            <option value="" disabled selected>Select no. of persons</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        `;
        tempDiv.appendChild(roomDiv);
      }

      const autoHeight = tempDiv.offsetHeight;
      tempDiv.remove();

      // Apply height and opacity transitions
      roomDetails.style.height = autoHeight + "px";
      roomDetails.style.opacity = "1";

      // Add room dropdowns with fade-in effect
      for (let i = 1; i <= numRooms; i++) {
        const roomDiv = document.createElement("div");
        roomDiv.className = "form-group fade-in";
        roomDiv.style.marginBottom = "15px";

        roomDiv.innerHTML = `
          <label for="room${i}">No of persons - Room ${i}:</label>
          <select id="room${i}" name="room${i}" class="input" required>
            <option value="" disabled selected>Select no. of persons</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        `;

        setTimeout(() => {
          roomDetails.appendChild(roomDiv);
        }, i * 100); // Cascading fade-in
      }

      // Reset height style after animation
      setTimeout(() => {
        roomDetails.style.height = "auto";
      }, 500); // Match the transition duration
    });


</script>

<script src="./assets/js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>

</script>

<script src="./assets/js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
