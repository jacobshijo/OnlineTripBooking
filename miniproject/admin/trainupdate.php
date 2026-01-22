<?php include("header.html"); ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$trainNo = $region = $returnTrainNo = $trainName = $origin = $destination = $originCode = $destinationCode = $originTime = $destinationTime = $originPlatform = $destinationPlatform = $duration = $classes = $seats1AC = $seats2AC = $seats3AC = $seatsSL = $seatsChairCar = $seatsChairCarAC = $price1AC = $price2AC = $price3AC = $priceSL = $priceChairCar = $priceChairCarAC = $runsOn = $noOfBookings = "";

if (isset($_POST['search'])) {
    $trainNo = $_POST['trainNo'];
    $query = "SELECT * FROM trains WHERE trainNo = '$trainNo'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        extract($row);
    } else {
        echo "Train not found.";
    }
}

if (isset($_POST['update'])) {
    $trainNo = $_POST['trainNo'];
    $region = $_POST['region'];
    $returnTrainNo = $_POST['returnTrainNo'];
    $trainName = $_POST['trainName'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $originCode = $_POST['originCode'];
    $destinationCode = $_POST['destinationCode'];
    $originTime = $_POST['originTime'];
    $destinationTime = $_POST['destinationTime'];
    $originPlatform = $_POST['originPlatform'];
    $destinationPlatform = $_POST['destinationPlatform'];
    $duration = $_POST['duration'];
    $classes = $_POST['classes'];
    $seats1AC = $_POST['seats1AC'];
    $seats2AC = $_POST['seats2AC'];
    $seats3AC = $_POST['seats3AC'];
    $seatsSL = $_POST['seatsSL'];
    $seatsChairCar = $_POST['seatsChairCar'];
    $seatsChairCarAC = $_POST['seatsChairCarAC'];
    $price1AC = $_POST['price1AC'];
    $price2AC = $_POST['price2AC'];
    $price3AC = $_POST['price3AC'];
    $priceSL = $_POST['priceSL'];
    $priceChairCar = $_POST['priceChairCar'];
    $priceChairCarAC = $_POST['priceChairCarAC'];
    $runsOn = $_POST['runsOn'];
    $noOfBookings = $_POST['noOfBookings'];

    $updateQuery = "UPDATE trains SET region='$region', returnTrainNo='$returnTrainNo', trainName='$trainName', origin='$origin', destination='$destination', originCode='$originCode', destinationCode='$destinationCode', originTime='$originTime', destinationTime='$destinationTime', originPlatform='$originPlatform', destinationPlatform='$destinationPlatform', duration='$duration', classes='$classes', seats1AC='$seats1AC', seats2AC='$seats2AC', seats3AC='$seats3AC', seatsSL='$seatsSL', seatsChairCar='$seatsChairCar', seatsChairCarAC='$seatsChairCarAC', price1AC='$price1AC', price2AC='$price2AC', price3AC='$price3AC', priceSL='$priceSL', priceChairCar='$priceChairCar', priceChairCarAC='$priceChairCarAC', runsOn='$runsOn', noOfBookings='$noOfBookings' WHERE trainNo='$trainNo'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "Train details updated successfully.";
    } else {
        echo "Error updating train: " . mysqli_error($conn);
    }
}
?>

<h2 class="text-center my-4">Update Train</h2>
<form method="post" action="">
    <div class="form-group">
        <h4>Train Number</h4>
        <input type="text" name="trainNo" class="form-control" placeholder="Enter Train Number" value="<?php echo $trainNo; ?>" required>
    </div>
    <button type="submit" name="search" class="btn btn-primary">Search</button>

    <?php if ($trainNo): ?>
        <div class="form-group">
            <h4>Region</h4>
            <input type="text" name="region" class="form-control" value="<?php echo $region; ?>" required>
        </div>
        <div class="form-group">
            <h4>Return Train Number</h4>
            <input type="text" name="returnTrainNo" class="form-control" value="<?php echo $returnTrainNo; ?>" required>
        </div>
        <div class="form-group">
            <h4>Train Name</h4>
            <input type="text" name="trainName" class="form-control" value="<?php echo $trainName; ?>" required>
        </div>
        <div class="form-group">
            <h4>Origin</h4>
            <input type="text" name="origin" class="form-control" value="<?php echo $origin; ?>" required>
        </div>
        <div class="form-group">
            <h4>Destination</h4>
            <input type="text" name="destination" class="form-control" value="<?php echo $destination; ?>" required>
        </div>
        <div class="form-group">
            <h4>Origin Code</h4>
            <input type="text" name="originCode" class="form-control" value="<?php echo $originCode; ?>" required>
        </div>
        <div class="form-group">
            <h4>Destination Code</h4>
            <input type="text" name="destinationCode" class="form-control" value="<?php echo $destinationCode; ?>" required>
        </div>
        <div class="form-group">
            <h4>Origin Time</h4>
            <input type="text" name="originTime" class="form-control" value="<?php echo $originTime; ?>" required>
        </div>
        <div class="form-group">
            <h4>Destination Time</h4>
            <input type="text" name="destinationTime" class="form-control" value="<?php echo $destinationTime; ?>" required>
        </div>
        <div class="form-group">
            <h4>Origin Platform</h4>
            <input type="text" name="originPlatform" class="form-control" value="<?php echo $originPlatform; ?>" required>
        </div>
        <div class="form-group">
            <h4>Destination Platform</h4>
            <input type="text" name="destinationPlatform" class="form-control" value="<?php echo $destinationPlatform; ?>" required>
        </div>
        <div class="form-group">
            <h4>Duration</h4>
            <input type="text" name="duration" class="form-control" value="<?php echo $duration; ?>" required>
        </div>
        <div class="form-group">
            <h4>Classes</h4>
            <input type="text" name="classes" class="form-control" value="<?php echo $classes; ?>" required>
        </div>
        <div class="form-group">
            <h4>Seats 1AC</h4>
            <input type="text" name="seats1AC" class="form-control" value="<?php echo $seats1AC; ?>" required>
        </div>
        <div class="form-group">
            <h4>Seats 2AC</h4>
            <input type="text" name="seats2AC" class="form-control" value="<?php echo $seats2AC; ?>" required>
        </div>
        <div class="form-group">
            <h4>Seats 3AC</h4>
            <input type="text" name="seats3AC" class="form-control" value="<?php echo $seats3AC; ?>" required>
        </div>
        <div class="form-group">
            <h4>Seats Sleeper</h4>
            <input type="text" name="seatsSL" class="form-control" value="<?php echo $seatsSL; ?>" required>
        </div>
        <div class="form-group">
            <h4>Seats Chair Car</h4>
            <input type="text" name="seatsChairCar" class="form-control" value="<?php echo $seatsChairCar; ?>" required>
        </div>
        <div class="form-group">
            <h4>Seats Chair Car AC</h4>
            <input type="text" name="seatsChairCarAC" class="form-control" value="<?php echo $seatsChairCarAC; ?>" required>
        </div>
        <div class="form-group">
            <h4>Price 1AC</h4>
            <input type="text" name="price1AC" class="form-control" value="<?php echo $price1AC; ?>" required>
        </div>
        <div class="form-group">
            <h4>Price 2AC</h4>
            <input type="text" name="price2AC" class="form-control" value="<?php echo $price2AC; ?>" required>
        </div>
        <div class="form-group">
            <h4>Price 3AC</h4>
            <input type="text" name="price3AC" class="form-control" value="<?php echo $price3AC; ?>" required>
        </div>
        <div class="form-group">
            <h4>Price Sleeper</h4>
            <input type="text" name="priceSL" class="form-control" value="<?php echo $priceSL; ?>" required>
        </div>
        <div class="form-group">
            <h4>Price Chair Car</h4>
            <input type="text" name="priceChairCar" class="form-control" value="<?php echo $priceChairCar; ?>" required>
        </div>
        <div class="form-group">
            <h4>Price Chair Car AC</h4>
            <input type="text" name="priceChairCarAC" class="form-control" value="<?php echo $priceChairCarAC; ?>" required>
        </div>
        <div class="form-group">
            <h4>Runs On</h4>
            <input type="text" name="runsOn" class="form-control" value="<?php echo $runsOn; ?>" required>
        </div>
        <div class="form-group">
            <h4>Number of Bookings</h4>
            <input type="text" name="noOfBookings" class="form-control" value="<?php echo $noOfBookings; ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
    <?php endif; ?>
</form>

<?php
mysqli_close($conn);
include("footer.html");
?>

