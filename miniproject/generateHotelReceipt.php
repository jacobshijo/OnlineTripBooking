<?php session_start();
if(!isset($_SESSION["username"]))
{
    	header("Location:blocked.php");
   		$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>

<!-- dumping the current page to buffer -->
<?php
ob_start();
?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<title>Bookify | Hotel Receipt</title>

		  <!-- favicon-->
		  <link rel="shortcut icon" href="./images/company-logo.svg" type="image/svg+xml">
    
    	<link href="css/main.css" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    	<script src="js/jquery-3.2.1.min.js"></script>
    	<script src="js/main.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    
		<style>
        /* Style for the custom alert-like box */
        .alert-box {
            position: fixed;
            top: 5px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
            width: 400px;
            text-align: center;
            z-index: 9999; /* Make sure it appears on top */
        }
    	</style>

	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
		
		<div class="spacer">a</div>
		
		<?php 
		
		date_default_timezone_set('Asia/Kolkata');
		$date = date('l jS \of F Y \a\t h:i:s A'); // Current date and time
		
		$hotelID=$_POST["hotelIDHidden"];
		$fare=$_POST["fareHidden"];
		
		?>
		
		<?php
		
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "tourism";
			
			// Creating a connection to MySQL database
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Checking if we've successfully connected to the database
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
		
		
		?>
		
		<div class="col-sm-12 generateReceipt">
		
			<div class="commonHeader">
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-7 text-left">
					
					<div class="headingOne">
						
						Booking Receipt
						
					</div>
					
					<div class="dateTime">
						
						<span class="generated">Generated: </span><?php echo $date; ?>
						
					</div>
					
				</div>

				<div class="col-sm-3 text-right">
					<img src="./images/company-logo2.png" alt="Bookify Logo" style="max-width: 50%; height: auto;"/>
				</div>
				
				<div class="col-sm-3 text-right">
					
					
				</div>
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-12"></div>
				
				<div class="col-sm-1"></div>
				<div class="col-sm-10 bar"></div>
				<div class="col-sm-1"></div>
					
			</div> <!-- contains the header  -->
				
				<div class="col-sm-12"></div> <!-- empty class -->
			
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
			
					<div class="subHeading">
						
						Booking Information:
						
					</div>
				
				</div>
							
				<div class="col-sm-12"></div> <!-- empty class -->
			
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10 boxCenter"> <!-- outboundFlight Box -->
				
					<?php
					
						$sql = "SELECT * FROM hotels WHERE hotelID='$hotelID'";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc()
					
					?>
					
					<div class="col-sm-1 borderRight text-center">
					
						<div class="flightOperatorHeading">
						
							Hotel ID
							
						</div>
						
						<div class="flightOperator">
						
							<?php $hotelID=$row["hotelID"];
							echo substr($hotelID,0,3) ?>
							
						</div>
						
						<div class="flightNo">
						
							<?php $hotelID=$row["hotelID"];
							echo substr($hotelID,3) ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-3 borderRight text-center">
					
						<div class="flightOperatorHeading">
						
							Hotel Name
							
						</div>
						
						<div class="flightOperator">
						
							<?php echo $row["hotelName"]; ?>
							
						</div>
						
						<div class="flightNo">
						
							<?php echo $row["locality"].', '.$row["city"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="departsHeading">
						
							Check In
							
						</div>
						
						<div class="departs">
						
							<?php echo $_SESSION["checkIn"]; ?>
							
						</div>
						
						<div class="departsSubscript">
						
							<?php echo $row["checkIn"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="arrivesHeading">
						
							Check Out
							
						</div>
						
						<div class="arrives">
						
							<?php echo $_SESSION["checkOut"]; ?>
							
						</div>
						
						<div class="arrivesSubscript">
						
							<?php echo $row["checkOut"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="originHeading">
						
							No. of rooms
							
						</div>
						
						<div class="origin">
						
							<?php echo $_SESSION["noOfRooms"]; ?>
							
						</div>
						
						<div class="originSubscript">
						
							rooms
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 text-center">
					
						<div class="destinationHeading">
						
							No. of guests
							
						</div>
						
						<div class="origin">
						
							<?php echo $_SESSION["noOfGuests"]; ?>
							
						</div>
						
						<div class="destinationSubscript">
						
							guests
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
				</div> <!-- outboundFlight Box -->
			
				<div class="col-sm-12 spacer">a</div>
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
			
					<div class="subHeading">
						
						Payment Information
						
					</div>
				
				</div>
							
				<div class="col-sm-12"></div> <!-- empty class -->
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-12"></div> <!-- empty class -->
				
				<div class="col-sm-1"></div>
			
					<div class="col-sm-10 boxCenter">
					
						<div class="columnHeaders">
							
							<div class="col-sm-4 borderBottom">
								
								<div class="serialNoHeader text-center">
									
									Charge per room
									
								</div>
								
							</div>
							
							<div class="col-sm-4 borderBottom">
								
								<div class="passengerNameHeader text-center">
									
									Amount paid
									
								</div>
								
							</div>
							
							<div class="col-sm-4 borderBottom">
								
								<div class="genderHeader text-center">
									
									Payment Mode
									
								</div>
								
							</div>
							
						</div> <!-- columnHeaders -->
						
						<div class="col-sm-4">
								
							<div class="serialNo text-center">
								
								<span class="rupee">₹</span><?php echo $row["price"]; ?>
								
							</div>
								
						</div>
						
						<div class="col-sm-4">
								
							<div class="serialNo text-center">
								
								<span class="rupee">₹</span><?php echo $fare ?>
								
							</div>
								
						</div>
						
						<div class="col-sm-4">
								
							<div class="serialNo text-center">
								
								Card Payment
								
							</div>
								
						</div>	
						
					</div> <!-- boxCenter -->
				
				<div class="col-sm-1"></div>
			
			<div class="importantInfo">
			
				<div class="col-sm-12"></div> <!-- empty class -->
				
				<div class="col-sm-12 spacer">a</div>
				<div class="col-sm-12 spacer">a</div>
				
				<div class="col-sm-1"></div>
				
					<div class="col-sm-10">
				
						<div class="subHeading">
							
							Important Information
							
						</div>
					
					</div>
						
				<div class="col-sm-1"></div>
					
				<div class="col-sm-12"></div>
						
				<div class="col-sm-1"></div>
				<div class="col-sm-10 bar"></div>
				<div class="col-sm-1"></div>
				
				<div class="col-sm-12"></div>
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
					
					<div class="info">
						
						<span class="strong">1.</span> A printed copy of this receipt must be presented at the time of check-in.						
						
					</div>
					
					<div class="info">
						
						<span class="strong">2.</span> It is mandatory to have a Government recognised photo identification (ID) when checking-in. This can include: Driving License, Passport, PAN Card, Voter ID Card or any other ID issued by the Government of India.
						
					</div>
					
				</div>
				
				<div class="col-sm-1"></div>
							
				<div class="col-sm-12 spacer">a</div>
								
				<div class="col-sm-12"></div> <!-- empty class -->
				
			</div> <!-- importantInfo -->
			
			
		</div> <!-- generateTicket -->
				
		<div class="spacer">a</div>
					
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>

<!-- after user login system is built push the username using the curent session to the database -->

<?php
	
	$user = $_SESSION["username"];
	$dateFormatted = date("d-m-Y"); //formatting the date as DD-MM-YY
	$hotelName = $row["hotelName"].', '.$row["locality"].', '.$row["city"];
	$bookingDataInsertSQL = "INSERT INTO `hotelbookings`(hotelName,hotelID,date,username,cancelled) VALUES('$hotelName','$hotelID','$dateFormatted','$user','no')";
	$bookingDataInsertQuery = $conn->query($bookingDataInsertSQL);
				
	$bookingIDSQL = "SELECT * FROM `hotelbookings` ORDER BY `bookingID` DESC LIMIT 1";
	$bookingIDQuery = $conn->query($bookingIDSQL);
	$bookingIDGet = $bookingIDQuery ->fetch_array(MYSQLI_NUM);
	$latestBookingID = $bookingIDGet[0];
	$currentBookingID = $latestBookingID;
								
?>

<!-- saving the file as temp.html -->
<?php
file_put_contents('receipts/HotelReceipt'.$currentBookingID.'.html', ob_get_contents());
?>


<!-- Custom Alert Box -->
<div id="alertBox" class="alert-box">
        Booking success<br>Redirecting to dashboard in <span id="countdown">5</span> seconds...
    </div>

    <script>
        window.onload = function () {
            // Set the initial countdown time
            let countdown = 5;
            const countdownElement = document.getElementById('countdown');

            // Start a countdown and update the countdown box every second
            const countdownInterval = setInterval(function () {
                countdown--; // Decrease the countdown by 1 second
                countdownElement.textContent = countdown; // Update the countdown in the box
                
                // If countdown reaches 0, clear the interval and redirect to the dashboard
                if (countdown <= 0) {
                    clearInterval(countdownInterval); // Stop the countdown
                    window.location.href = "userDashboardHotelBookings"; // Redirect to the dashboard
                }
            }, 1000); // Update every second
        };
    </script>