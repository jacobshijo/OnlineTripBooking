<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookify | Dashboard - Flight Bookings</title>

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

	</style>

</style>

<style>
  .customConfirmBox {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
  }

  .overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9998;
    display: none;
  }

  /* Your existing card and other CSS code */
  .card {
    width: 300px;
    height: fit-content;
    background: rgb(255, 255, 255);
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 20px;
    padding: 30px;
    position: relative;
    box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.068);
  }

  .card-content {
    width: 100%;
    height: fit-content;
    display: flex;
    flex-direction: column;
    gap: 5px;
  }

  .card-heading {
    font-size: 20px;
    font-weight: 700;
    color: rgb(27, 27, 27);
  }

  .card-description {
    font-weight: 100;
    color: rgb(102, 102, 102);
  }

  .card-button-wrapper {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
  }

  .card-button {
    width: 50%;
    height: 35px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    font-weight: 600;
  }

  .primary {
    background-color: rgb(255, 114, 109);
    color: white;
  }

  .primary:hover {
    background-color: rgb(255, 73, 66);
  }

  .secondary {
    background-color: #ddd;
  }

  .secondary:hover {
    background-color: rgb(197, 197, 197);
  }

  .exit-button {
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    background-color: transparent;
    position: absolute;
    top: 20px;
    right: 20px;
    cursor: pointer;
  }

  .exit-button:hover svg {
    fill: black;
  }

  .exit-button svg {
    fill: rgb(175, 175, 175);
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
              <div class="menuContainer active">
                <span class="fa fa-clone"></span> Flight Bookings
              </div>
              <a href="userDashboardTrainBookings.php">
                <div class="menuContainer">
                  <span class="fa fa-close"></span> Train Bookings
                </div>
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
					
				$hotelBookingsSQL = "SELECT COUNT(*) FROM `flightbookings` WHERE Username='$user' AND cancelled='no'";
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
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">E-Ticket</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Cancel</th>
								</tr>
							</thead>
							
							<?php
	                            //checking hotel booking query
								$hotelBooksSQL = "SELECT * FROM `flightbookings` WHERE username='$user' AND cancelled='no'";
								$hotelBooksQuery = $conn->query($hotelBooksSQL);
				
								while($hotelBooksRow = $hotelBooksQuery->fetch_assoc()) { 
									
								?>
								
								<tr>
									<td class="tableElementTagsNoHover text-center"><?php echo $hotelBooksRow["bookingID"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $hotelBooksRow["origin"]; ?></td>
                                    <td class="tableElementTagsNoHover text-center"><?php echo $hotelBooksRow["destination"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $hotelBooksRow["date"]; ?></td>
									<td class="tableElementTags text-center">
                    <a href="receipts/FlightTicket<?php echo $hotelBooksRow['bookingID']; ?>.html" target="_blank">
                     <img src="./images/download.png" alt="Download" style="width: 20px; height: 20px;" />
                     </a>
                  </td>
                  <td class="tableElementTags text-center">
                    <a href="javascript:void(0);" onclick="showCustomConfirmBox(<?php echo $hotelBooksRow['bookingID']; ?>)">
                      <img src="./images/cancel.png" alt="Cancel" style="width: 20px; height: 20px;" />
                    </a>
                  </td>

									
								</tr>
								
							<?php } ?>
					
						</table>
						
				</div>
				
				<?php else: ?>
				
				<div class="col-sm-12 ticketTableContainer" id="flightTicketsWrapper">
				
					<div class="noBooking">
					
						Looks like you haven't booked any flights with us yet. 
					
					</div>
				
				</div>
				
				<?php endif; ?>
</section>

<!-- Custom Confirm Box -->
<div id="customConfirmBox" class="customConfirmBox">
  <div class="card">
    <div class="card-content">
      <p class="card-heading">Cancel booking?</p>
      <p class="card-description">Are you sure you want to cancel this booking?</p>
    </div>
    <div class="card-button-wrapper">
      <button class="card-button secondary" onclick="closeCustomConfirmBox()">Cancel</button>
      <button class="card-button primary" id="confirmDeleteButton">Delete</button>
    </div>
    <button class="exit-button" onclick="closeCustomConfirmBox()">
      <svg height="20px" viewBox="0 0 384 512">
        <path
          d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"
        ></path>
      </svg>
    </button>
  </div>
</div>

<!-- Overlay -->
<div id="overlay" class="overlay"></div>

<script>
  function showCustomConfirmBox(bookingID) {
    document.getElementById("customConfirmBox").style.display = "block";
    document.getElementById("overlay").style.display = "block";

    // Handle the "Delete" button click
    document.getElementById("confirmDeleteButton").onclick = function() {
      window.location.href = "cancelFlightBooking.php?bookingID=" + bookingID;
    };
  }

  function closeCustomConfirmBox() {
    document.getElementById("customConfirmBox").style.display = "none";
    document.getElementById("overlay").style.display = "none";
  }
</script>


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
