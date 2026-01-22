<title>Bookify | Passenger Details</title>

  <!-- favicon-->
  <link rel="shortcut icon" href="./images/company-logo.svg" type="image/svg+xml">

<?php 
session_start();
if (!isset($_SESSION["username"])) {
    header("Location:blocked.php");
    $_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Passengers | tourism_management</title>
    
    <link href="css/main.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        // Client-side validation to check if all fields are filled
        function validateForm() {
            const totalPassengers = <?php echo $totalPassengers; ?>;
            for (let i = 1; i <= totalPassengers; i++) {
                const name = document.forms["passengerForm"]["name" + i].value;
                const gender = document.forms["passengerForm"]["gender" + i].value;
                if (name === "" || gender === "") {
                    alert("Please fill in the details for all passengers.");
                    return false;
                }
            }
            return true;
        }
    </script>
</head>
<body>

    <?php
        $fare = $_POST["fareHidden"];
        $mode = $_POST["modeHidden"];

        // Initialize variables with default values
        $type = $depart = $return = $adults = $children = $flightNoOutbound = $className = "";

        if ($mode == "OneWayFlight") {
            $type = $_POST["typeHidden"];
            $class = $_POST["classHidden"];
            $origin = $_POST["originHidden"];
            $destination = $_POST["destinationHidden"];
            $depart = $_POST["departHidden"];
            $return = $_POST["returnHidden"];
            $adults = $_POST["adultsHidden"];
            $children = $_POST["childrenHidden"];
            $totalPassengers = (int)$adults + (int)$children;

            if ($type == "One Way") {
                $flightNoOutbound = $_POST["flightNoOutboundHidden"];
            }

            $className = ($class == "Economy Class") ? "Economy" : "Business";
        } elseif ($mode == "train") {
            $date = $_POST["dateHidden"];
            $day = $_POST["dayHidden"];
            $trainID = $_POST["trainIDHidden"];
            $totalPassengers = $_POST["noOfPassengersHidden"];
            $origin = $_POST["originHidden"];
            $destination = $_POST["destinationHidden"];
            $class = $_POST["classHidden"];
        }
    ?>

    <div class="spacer">a</div>
    <div class="col-sm-12 passengersWrapper">
        <div class="headingOne">
            Please enter the details of the passengers
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="boxCenter">
                <form name="passengerForm" action="payment.php" method="POST" onsubmit="return validateForm()">
                    <?php for ($i = 1; $i <= $totalPassengers; $i++) { ?>
                        <div class="col-sm-9 nameTag">Name of passenger <?php echo $i; ?>:</div>
                        <div class="col-sm-3 ageTag">Gender:</div>
                        <input type="text" class="inputPassengerName" name="name<?php echo $i; ?>" placeholder="Enter the full name of passenger <?php echo $i; ?>" required/>
                        <select class="inputSmall" required name="gender<?php echo $i; ?>">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    <?php } ?>

                    <div class="text-center">
                        <input type="submit" class="continueButton" value="Proceed to payment">
                        
                        <!-- Hidden fields -->
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
                        <input type="hidden" name="modeHidden" value="<?php echo $mode; ?>">

                        <?php if ($mode == "train") { ?>
                            <input type="hidden" name="dateHidden" value="<?php echo $date; ?>">
                            <input type="hidden" name="dayHidden" value="<?php echo $day; ?>">
                            <input type="hidden" name="classHidden" value="<?php echo $class; ?>">
                            <input type="hidden" name="trainIDHidden" value="<?php echo $trainID; ?>">
                        <?php } ?>

                        <?php if ($mode == "OneWayFlight" && $type == "One Way") { ?>
                            <input type="hidden" name="flightNoOutboundHidden" value="<?php echo $flightNoOutbound; ?>">
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>

</body>
</html>
