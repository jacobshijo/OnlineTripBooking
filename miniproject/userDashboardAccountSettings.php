<?php session_start();

if(!isset($_SESSION["username"]))
{
    	header("Location:blocked.php");
   		$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookify | Dashboard - Account Settings</title>

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
  width: 90%;
  padding: 20px;
  margin-right: -60px;
}

.profileWrapper {
  display: grid;
  grid-template-columns: auto 1fr;
  gap: 10px 20px;
  text-align: left;
  margin-bottom: 15px;
}

.profileWrapper .tag {
  font-weight: 600;
  margin-right: 3px;
}

.profileWrapper .content {
  font-weight: 400;
  color: #dcdcdc;
  padding: 5px 10px;
  border-radius: 5px;
  text-align: left;
}


.button {
  position: relative;
  width: 150px;
  height: 40px;
  cursor: pointer;
  display: flex;
  align-items: center;
  border: 2px solid var(--main-color);
  box-shadow: 4px 4px var(--main-color);
  background-color: var(--bg-color);
  border-radius: 10px;
  overflow: hidden;
}

.hor-space {
    width: 50px; /* Horizontal space */
    background-color: transparent; /* To keep it blank, we don't add any color */
}

.vert-space {
    height: 50px; /* Vertical space */
    background-color: transparent; /* To keep it blank, we don't add any color */
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
	  <a href="userDashboardProfile.php">
        <div class="menuContainer">
          <span class="fa fa-user-o"></span> My Profile
        </div>
		</a>
        <a href="userDashboardHotelBookings.php">
          <div class="menuContainer">
            <span class="fa fa-copy"></span> Hotel Bookings
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
          <div class="menuContainer active">
            <span class="fa fa-bar-chart"></span> Account Stats
          </div>

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

<div class="col-sm-7 containerBoxRight text-left">
				
				<?php
				
					$user = $_SESSION["username"];
				
					$flightBookingsSQL = "SELECT COUNT(*) FROM `flightbookings` WHERE Username='$user' AND cancelled='no'";
					$flightBookingsQuery = $conn->query($flightBookingsSQL);
					$noOfFlightBookings = $flightBookingsQuery->fetch_array(MYSQLI_NUM);
				
					$hotelBookingsSQL = "SELECT COUNT(*) FROM `hotelbookings` WHERE Username='$user' AND cancelled='no'";
					$hotelBookingsQuery = $conn->query($hotelBookingsSQL);
					$noOfHotelBookings = $hotelBookingsQuery->fetch_array(MYSQLI_NUM);
				
					$trainBookingsSQL = "SELECT COUNT(*) FROM `trainbookings` WHERE Username='$user' AND cancelled='no'";
					$trainBookingsQuery = $conn->query($trainBookingsSQL);
					$noOfTrainBookings = $trainBookingsQuery->fetch_array(MYSQLI_NUM);
				
				?>
				
				<div class="col-sm-12 settings">
					
        <div class="col-sm-6 profileWrapper topMargin">
					<span class="tag">No. of bookings </span>
				</div>

					<div class="col-sm-6 profileWrapper topMargin">
					<span class="content">No. of flight bookings: </span><span class="content"><?php echo $noOfFlightBookings[0]; ?> </span>
					</div>
					<div class="col-sm-6 profileWrapper topMargin">
					<span class="content">No. of train bookings:  </span><span class="content"><?php echo $noOfTrainBookings[0];?> </span>
					</div>
					<div class="col-sm-12 profileWrapper">
					<span class="content">No. of hotel bookings: </span><span class="content"><?php echo $noOfHotelBookings[0]; ; ?> </span>
					</div>
          
          <div class="vert-space"></div>

          <div class="col-sm-6 profileWrapper">
            <label for="cancelled" class="tag">View Cancelled Bookings: </label>
            <a href="viewCancelledHotelBookings.php" id="cancelledButton">
              <img src="images/view.png" alt="Cancelled Bookings" style="width: 20px; height: 25px;">
            </a>
          </div>

          <div class="col-sm-6 profileWrapper">
            <label for="cancelled" class="tag">View Payment Details: </label>
            <a href="viewPaymentDetails.php" id="cancelledButton">
              <img src="images/payment.png" alt="Payment Details" style="width: 20px; height: 20px;">
            </a>
          </div>

          <div class="col-sm-6 profileWrapper">
            <label for="deleteButton" class="tag">Delete account: </label>
            <a href="deleteUserAccount.php" id="deleteButton">
              <img src="images/delete.png" alt="Delete Account" style="width: 20px; height: 20px;">
            </a>
          </div>

          
					
				</div>
				
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
