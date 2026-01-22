<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookify | Dashboard - Profile</title>

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
		body {
  font-family: 'Poppins', sans-serif;
  background-color: #f0f0f0;
}

.container-fluid {
  display: flex;
  justify-content: center;
  padding: 20px;
}

.userDashboard {
  background-color: #3b3b3b;
  border-radius: 10px;
  overflow: hidden;
  display: flex;
  color: #fff;
  width: 1000px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.containerBoxLeft {
  width: 30%;
  background-color: #2b2b2b;
  padding: 20px;
}

.menuContainer {
  padding: 15px 10px;
  margin-bottom: 10px;
  display: flex;
  align-items: center;
  font-size: 16px;
  cursor: pointer;
  border-bottom: 1px solid #494949;
  color: #fff;
}

.menuContainer.active,
.menuContainer:hover {
  color: #e74c3c;
}

.menuContainer span {
  margin-right: 10px;
}

.containerBoxRight {
  width: 80%;
  padding: 35px;
}

.profileWrapper {
  display: grid;
  grid-template-columns: auto 1fr;
  gap: 10px 20px;
  align-items: center;
  margin-bottom: 15px;
}

.profileWrapper .tag {
  font-weight: 600;
}

.profileWrapper .content {
  font-weight: 400;
  color: #dcdcdc;
  /* background-color: #2b2b2b; */
  padding: 5px 10px;
  border-radius: 5px;
  text-align: left;
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
  <div class="container-fluid">
    <div class="userDashboard">
      <!-- Left Navigation Menu -->
      <div class="containerBoxLeft">
        <div class="menuContainer active">
          <span class="fa fa-user-o"></span> My Profile
        </div>
        <a href="userDashboardHotelBookings.php">
          <div class="menuContainer">
            <span class="fa fa-copy"></span> Hotels Bookings
          </div>
        </a>
        <a href="userDashboardFlightBookings.php">
          <div class="menuContainer">
            <span class="fa fa-clone"></span> Flight Bookings
          </div>
        </a>
        <a href="userDashboardTrainBookings.php">
          <div class="menuContainer">
            <span class="fa fa-close"></span> Train Bookings
          </div>
        </a>
        <a href="userDashboardAccountSettings.php">
          <div class="menuContainer">
            <span class="fa fa-bar-chart"></span> Account Stats
          </div>
        </a>
      </div>

            <div class="col-sm-7 containerBoxRight text-left">
              <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tourism";
                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }

                $user = $_SESSION["username"];
                $profileSQL = "SELECT * FROM `users` WHERE Username='$user'";
                $profileQuery = $conn->query($profileSQL);
                $row = $profileQuery->fetch_assoc();
              ?>

<div class="profileWrapper">
  <span class="tag">Username:</span>
  <span class="content"><?php echo '&emsp;','&emsp;','&emsp;','&ensp;', $row["Username"]; ?></span>
</div>
<div class="profileWrapper">
  <span class="tag">Full Name:</span>
  <span class="content"><?php echo '&emsp;','&emsp;','&emsp;','&ensp;','&nbsp;', $row["FullName"]; ?></span>
</div>
<div class="profileWrapper">
  <span class="tag">E-Mail:</span>
  <span class="content"><?php echo '&emsp;','&emsp;','&emsp;','&emsp;','&emsp;','&ensp;', $row["EMail"]; ?></span>
</div>
<div class="profileWrapper">
  <span class="tag">Phone:</span>
  <span class="content"><?php echo '&emsp;','&emsp;','&emsp;','&emsp;','&emsp;','&ensp;', $row["Phone"]; ?></span>
</div>
<div class="profileWrapper">
  <span class="tag">Address:</span>
  <span class="content">
    <?php echo '&emsp;','&emsp;','&emsp;','&emsp;','&ensp;', $row["AddressLine1"].", ".$row["AddressLine2"].", ".$row["City"].", ".$row["State"]; ?>
  </span>
</div>
<div class="profileWrapper">
  <span class="tag">Account Created:</span>
  <span class="content"><?php echo $row["Date"]; ?></span>
</div>

      </div>
    </div>
  </div>
</section>

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
