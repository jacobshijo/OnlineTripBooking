<title>Bookify | Payment</title>

  <!-- favicon-->
  <link rel="shortcut icon" href="./images/company-logo.svg" type="image/svg+xml">

<?php session_start();
if(!isset($_SESSION["username"]))
{
    	header("Location:blocked.php");
   		$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>

<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .center-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
        }

        .loader {
            width: 250px;
            height: 50px;
            position: relative;
        }
        .loader-text {
            position: absolute;
            top: 0;
            margin: 0;
            color: #C8B6FF;
            animation: text_713 3.5s ease both infinite;
            font-size: 16px;
			font-weight: bold;
            letter-spacing: 1px;
        }
        .load {
            background-color: #9A79FF;
            border-radius: 50px;
            height: 16px;
            width: 16px;
            position: absolute;
            bottom: 0;
            transform: translateX(64px);
            animation: loading_713 3.5s ease both infinite;
        }
        .load::before {
            content: "";
            width: 100%;
            height: 100%;
            background-color: #D1C2FF;
            border-radius: inherit;
            animation: loading2_713 3.5s ease both infinite;
        }

        @keyframes text_713 {
            0%, 100% { letter-spacing: 1px; transform: translateX(0); }
            40% { letter-spacing: 2px; transform: translateX(36px); }
            80% { letter-spacing: 1px; transform: translateX(70px); }
            90% { letter-spacing: 2px; transform: translateX(0); }
        }
        @keyframes loading_713 {
            0%, 100% { width: 16px; transform: translateX(0); }
            40% { width: 100%; transform: translateX(0); }
            80% { width: 16px; transform: translateX(200px); }
            90% { width: 100%; transform: translateX(0); }
        }
        @keyframes loading2_713 {
            0%, 100% { transform: translateX(0); width: 16px; }
            40% { transform: translateX(0); width: 80%; }
            80% { width: 100%; transform: translateX(0); }
            90% { width: 80%; transform: translateX(15px); }
        }

        .visa-card {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-end;
            width: 300px;
            height: 180px;
            background-image: radial-gradient(
              circle 897px at 9% 80.3%,
              rgba(55, 60, 245, 1) 0%,
              rgba(234, 161, 15, 0.9) 100.2%
            );
            border-radius: 10px;
            padding: 20px;
            font-family: Arial, Helvetica, sans-serif;
            position: relative;
            gap: 15px;
        }

        .logoContainer {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            height: fit-content;
            position: absolute;
            top: 0;
            left: 0;
            padding: 18px;
        }
        .svgLogo {
            height: 40px;
            width: auto;
            margin-right: 50px;
        }
        .inputstyle::placeholder {
            color: #ffffff;
        }
        .inputstyle {
            background-color: transparent;
            border: none;
            outline: none;
            color: white;
            caret-color: red;
            font-size: 13px;
            height: 25px;
            letter-spacing: 1.5px;
        }
        .number-container {
            width: 100%;
            height: fit-content;
            display: flex;
            flex-direction: column;
        }
        #cardNumber {
            width: 100%;
            height: 25px;
        }
        .name-date-cvv-container {
            width: 100%;
            height: 25px;
            display: flex;
            gap: 10px;
        }
        .name-wrapper {
            width: 60%;
            display: flex;
            flex-direction: column;
        }
        .expiry-wrapper, .cvv-wrapper {
            width: 30%;
            display: flex;
            flex-direction: column;
        }
        .cvv-wrapper { width: 10%; }
        .input-label {
            font-size: 8px;
            letter-spacing: 1.5px;
            color: #e2e2e2;
            width: 100%;
        }
    </style>

<!-- SESSION CODE STATRS-->
<?php 
	$_SESSION["P_name"]=$_POST["nameOnCard"];
	$_SESSION["P_card"] = $_POST["cardNumber"];
	$_SESSION["P_expiry"] = $_POST["expiry"];
?>
<!-- SESSION CODE ENDS-->

<div class="center-container">
        <div class="loader">
            <span class="loader-text">Payment processing</span>
            <span class="load"></span>
        </div>
        <div class="visa-card">
            <div class="logoContainer">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="23" height="23" viewBox="0 0 48 48" class="svgLogo">
                    <path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z"></path>
                    <path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z"></path>
                    <path fill="#ff3d00" d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48C20.376,15.05,18,19.245,18,24z"></path>
                </svg>
            </div>
            <div class="number-container">
                <label class="input-label" for="cardNumber">CARD NUMBER</label>
                <input class="inputstyle" id="cardNumber" placeholder="<?php echo $_SESSION["P_card"]; ?>" name="cardNumber" type="text" />
            </div>
            <div class="name-date-cvv-container">
                <div class="name-wrapper">
                    <label class="input-label" for="holderName">CARD HOLDER</label>
                    <input class="inputstyle" id="holderName" placeholder="<?php echo strtoupper($_SESSION["P_name"]); ?>" type="text" />
                </div>
                <div class="expiry-wrapper">
                    <label class="input-label" for="expiry">VALID THRU</label>
                    <input class="inputstyle" id="expiry" placeholder="<?php echo $_SESSION["P_expiry"]; ?>" type="text" />
                </div>
                <div class="cvv-wrapper">
                    <label class="input-label" for="cvv">CVV</label>
                    <input class="inputstyle" placeholder="***" maxlength="3" id="cvv" type="password" />
                </div>
            </div>
        </div>
    </div>

<?php
		
			$mode=$_POST["modeHidden"];
		
			if($mode=="ReturnTripFlight" or $mode=="OneWayFlight") {
		
				$totalPassengers=$_POST["totalPassengersHidden"];
			
				for($i=1; $i<=$totalPassengers; $i++) {
					$name[$i]=$_POST["name$i"];
					$gender[$i]=$_POST["gender$i"];
				}
			
				$fare=$_POST["fareHidden"];
				$type=$_POST["typeHidden"];
				$class=$_POST["classHidden"];
				$origin=$_POST["originHidden"];
				$destination=$_POST["destinationHidden"];
				$depart=$_POST["departHidden"];
				$return=$_POST["returnHidden"];
				$adults=$_POST["adultsHidden"];
				$children=$_POST["childrenHidden"];
				$noOfPassengers=(int)$adults+(int)$children;
			
				if($type=="Return Trip") {
					$flightNoOutbound=$_POST["flightNoOutboundHidden"];
					$flightNoInbound=$_POST["flightNoInboundHidden"];
				}
				elseif($type=="One Way") {
					$flightNoOutbound=$_POST["flightNoOutboundHidden"];
				}
			
				if($class=="Economy Class")
					$className="Economy";
				else
					$className="Business";
			
			} // for flights
		
			elseif($mode=="hotel") {
				$fare=$_POST["fareHidden"];
				$hotelID=$_POST["hotelIDHidden"];
		} //for hotels
		
		
			elseif($mode=="train") {
				$totalPassengers=$_POST["totalPassengersHidden"];
				$fare=$_POST["fareHidden"];
				$trainID=$_POST["trainIDHidden"];
				$origin=$_POST["originHidden"];
				$destination=$_POST["destinationHidden"];
				$date=$_POST["dateHidden"];
				$day=$_POST["dayHidden"];
				$class=$_POST["classHidden"];
				
				for($i=1; $i<=$totalPassengers; $i++) {
					$name[$i]=$_POST["name$i"];
					$gender[$i]=$_POST["gender$i"];
				}
			} //for train
		
		?>

<!-- Confirm your Payment: -->
				
<?php if($mode=="ReturnTripFlight" or $mode=="OneWayFlight"): ?>
				
				<form action="generateFlightTicket.php" method="POST">
				
					<div class="col-sm-12 bookingButton text-center">
						<input type="submit" class="paymentButton" value="Pay Now" style="display: none;">
					</div>
					
					<input type="hidden" name="totalPassengersHidden" value="<?php echo $totalPassengers; ?>">
						
					<input type="hidden" name="fareHidden" value="<?php echo $fare; ?>">
					<input type="hidden" name="typeHidden" value="<?php echo $type; ?>">
					<input type="hidden" name="classHidden" value="<?php echo $class; ?>">
					<input type="hidden" name="originHidden" value="<?php echo $origin; ?>">
					<input type="hidden" name="destinationHidden" value="<?php echo $destination; ?>">
					<input type="hidden" name="departHidden" value="<?php echo $depart; ?>">
					<input type="hidden" name="returnHidden" value="<?php echo $return; ?>">
					<input type="hidden" name="adultsHidden" value="<?php echo $adults; ?>">
					<input type="hidden" name="childrenHidden" value="<?php echo $children; ?>">
					<input type="hidden" name="modeHidden" value="<?php echo $mode ?>">
					
					<?php for($i=1; $i<=$totalPassengers; $i++) {?>
					
						<input type="hidden" name="nameHidden<?php echo $i; ?>" value="<?php echo $name[$i]; ?>">
						<input type="hidden" name="genderHidden<?php echo $i; ?>" value="<?php echo $gender[$i]; ?>">
					
					<?php } ?>
					
					<?php if($type=="Return Trip") { ?>
					<input type="hidden" name="flightNoOutboundHidden" value="<?php echo $flightNoOutbound; ?>">
					<input type="hidden" name="flightNoInboundHidden" value="<?php echo $flightNoInbound; ?>">
					<?php } elseif($type=="One Way") { ?>
					<input type="hidden" name="flightNoOutboundHidden" value="<?php echo $flightNoOutbound; ?>">
					<?php } ?>
					
				</form>
				
				<script>
					// Automatically click the button after 5 seconds
					setTimeout(function() {
						document.querySelector('.paymentButton').click();
					}, 5000);
				</script>

				<!-- hotels -->
				
				<?php elseif($mode=="hotel"): ?>
				
				<form action="generateHotelReceipt.php" method="POST">
				
					<div class="col-sm-12 bookingButton text-center">
						<input type="submit" class="paymentButton" value="Pay Now" style="display: none;">
					</div>
					
					<input type="hidden" name="hotelIDHidden" value="<?php echo $hotelID; ?>">
					<input type="hidden" name="fareHidden" value="<?php echo $fare; ?>">
					
				</form>
				
				<script>
					// Automatically click the button after 5 seconds
					setTimeout(function() {
						document.querySelector('.paymentButton').click();
					}, 5000);
				</script>

				<!--trains--->
				<?php elseif($mode=="train"): ?>
				
				<form action="generateTrainTicket.php" method="POST">
				
					<div class="col-sm-12 bookingButton text-center">
						
						<?php $date=$_POST["dateHidden"]; ?>
					
						<input type="hidden" name="dateHidden" value="<?php echo $date; ?>">
						<input type="hidden" name="dayHidden" value="<?php echo $day; ?>">
						<input type="hidden" name="classHidden" value="<?php echo $class; ?>">
						<input type="submit" class="paymentButton" value="Pay Now" style="display: none;">
					</div>
					
					<input type="hidden" name="totalPassengersHidden" value="<?php echo $totalPassengers; ?>">
					<input type="hidden" name="fareHidden" value="<?php echo $fare; ?>">
					<input type="hidden" name="originHidden" value="<?php echo $origin; ?>">
					<input type="hidden" name="destinationHidden" value="<?php echo $destination; ?>">
					<input type="hidden" name="modeHidden" value="<?php echo $mode ?>">
					
					<?php for($i=1; $i<=$totalPassengers; $i++) {?>
					
						<input type="hidden" name="nameHidden<?php echo $i; ?>" value="<?php echo $name[$i]; ?>">
						<input type="hidden" name="genderHidden<?php echo $i; ?>" value="<?php echo $gender[$i]; ?>">
					
					<?php } ?>
					
					<input type="hidden" name="trainIDHidden" value="<?php echo $trainID; ?>">
					
				</form>
				
				<script>
					// Automatically click the button after 5 seconds
					setTimeout(function() {
						document.querySelector('.paymentButton').click();
					}, 5000);
				</script>


				<?php endif; ?>
				
				
				
				
				</div>
				
			</div>
			
			<div class="col-sm-3"></div>
			
		</div> <!-- paymentWrapper -->