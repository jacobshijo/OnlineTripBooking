<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookify | Cancelled Flight Bookings</title>

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
  gap: 10px;
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
  padding: 20px;
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
  margin-right: 10px;
}

.profileWrapper .content {
  font-weight: 400;
  color: #dcdcdc;
  /* background-color: #2b2b2b; */
  padding: 5px 10px;
  border-radius: 5px;
  text-align: left;
}

.table {
  width: 100%;
  border-collapse: collapse;
}

.table th,
.table td {
  padding: 10px;
  text-align: center;
  border: 0px solid #ddd;
}

.table td img {
  display: block;
  margin: auto;
}

.table thead th {
  background-color: #2b2b2b;
  color: #fff;
}

.table tbody tr:hover {
  background-color: #444;
}

.noBooking {
  padding: 20px;
  text-align: center;
  color: #ccc;
}

.ticketTableContainer {
  overflow-x: auto;
  margin-top: 10px;
  border: 1px solid #444;
  padding: 10px;
}

  /* Wrapper for the image and popup text */
  .image-wrapper {
    position: relative;
    display: inline-block;
    cursor: default; /* Remove the mouse click */
  }

  /* Style for the popup text */
  .popup-text {
    visibility: hidden;
    width: 250px; /* Adjust width of the popup */
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 5px;
    padding: 8px;
    position: absolute;
    z-index: 1;
    bottom: 125%; /* Position the popup above the image */
    left: 50%;
    transform: translateX(-80%);
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    font-size: 14px;
    white-space: normal; /* Adjust text wrapping */
  }

  /* Arrow for the popup */
  .popup-text::after {
    content: '';
    position: absolute;
    top: 100%; /* Pointing to the image */
    left: 50%;
    transform: translateX(-80%);
    border-width: 5px;
    border-style: solid;
    border-color: #333 transparent transparent transparent;
  }

  /* Show the popup when hovering over the image wrapper */
  .image-wrapper:hover .popup-text {
    visibility: visible;
    opacity: 1;
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
              <a href="viewCancelledHotelBookings.php">
                <div class="menuContainer">
                  <span class="fa fa-copy"></span> Cancelled Hotel Bookings
                </div>
              </a>
              <div class="menuContainer active">
                <span class="fa fa-clone"></span> Cancelled Flight Bookings
              </div>
              <a href="viewCancelledTrainBookings.php">
                <div class="menuContainer">
                  <span class="fa fa-close"></span> Cancelled Trains Bookings
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

<div class="col-sm-7 containerBoxRightHotel text-left">
			
			<div class="col-sm-12 tickets">
			
				<?php
				
				$user = $_SESSION["username"];
					
				$hotelBookingsSQL = "SELECT COUNT(*) FROM `flightbookings` WHERE Username='$user' AND cancelled='yes'";
				$hotelBookingsQuery = $conn->query($hotelBookingsSQL);
				$noOfHotelBookings = $hotelBookingsQuery->fetch_array(MYSQLI_NUM);
				
				if($noOfHotelBookings[0]>0): ?>
				
				
				<div class="col-sm-12 ticketTableContainer pullABitLeft" id="hotelBookingsWrapper">
					
						<table class="table table-responsive">
							<thead>
								<tr>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Id</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Origin</th>
                                    <th class="tableHeaderTags text-center" style="vertical-align: middle;">Destination</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Date</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Details</th>
								</tr>
							</thead>
							
							<?php
	                            //checking hotel booking query
								$hotelBooksSQL = "SELECT * FROM `flightbookings` WHERE username='$user' AND cancelled='yes'";
								$hotelBooksQuery = $conn->query($hotelBooksSQL);
				
								while($hotelBooksRow = $hotelBooksQuery->fetch_assoc()) { 
									
								?>
								
								<tr>
									<td class="tableElementTagsNoHover text-center"><?php echo $hotelBooksRow["bookingID"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $hotelBooksRow["origin"]; ?></td>
                                    <td class="tableElementTagsNoHover text-center"><?php echo $hotelBooksRow["destination"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $hotelBooksRow["date"]; ?></td>
									<td class="tableElementTags text-center">
                  <a href="javascript:void(0)" target="_self" class="image-wrapper">
                    <img src="./images/view.png" alt="Download" style="width: 20px; height: 20px;" id="viewImage" />
                    <span class="popup-text">Flight booking canceled, refund successful</span>
                  </a>
                  </td>


									
								</tr>
								
							<?php } ?>
					
						</table>
						
				</div>
				
				<?php else: ?>
				
				<div class="col-sm-12 ticketTableContainer" id="flightTicketsWrapper">
				
					<div class="noBooking">
					
						Looks like you haven't cancelled any flight bookings yet. 
					
					</div>
				
				</div>
				
				<?php endif; ?>
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
