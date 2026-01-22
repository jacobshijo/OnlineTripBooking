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

$flight_no = $origin = $destination = $distance = $fare = $class = $seats_available = $departs = $arrives = $operator = $origin_code = $destination_code = $refundable = $noOfBookings = "";

if (isset($_POST['search'])) {
    $flight_no = $_POST['flight_no'];
    $query = "SELECT * FROM flights WHERE flight_no = '$flight_no'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        extract($row);
    } else {
        echo "Flight not found.";
    }
}

if (isset($_POST['update'])) {
    $flight_no = $_POST['flight_no'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $distance = $_POST['distance'];
    $fare = $_POST['fare'];
    $class = $_POST['class'];
    $seats_available = $_POST['seats_available'];
    $departs = $_POST['departs'];
    $arrives = $_POST['arrives'];
    $operator = $_POST['operator'];
    $origin_code = $_POST['origin_code'];
    $destination_code = $_POST['destination_code'];
    $refundable = $_POST['refundable'];
    $noOfBookings = $_POST['noOfBookings'];

    $updateQuery = "UPDATE flights SET origin='$origin', destination='$destination', distance='$distance', fare='$fare', class='$class', seats_available='$seats_available', departs='$departs', arrives='$arrives', operator='$operator', origin_code='$origin_code', destination_code='$destination_code', refundable='$refundable', noOfBookings='$noOfBookings' WHERE flight_no='$flight_no'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "Flight details updated successfully.";
    } else {
        echo "Error updating flight: " . mysqli_error($conn);
    }
}
?>

<h2 class="text-center my-4">Update Flight</h2>
<form method="post" action="">
    <div class="form-group">
        <h4>Flight Number</h4>
        <input type="text" name="flight_no" class="form-control" placeholder="Enter Flight Number" value="<?php echo $flight_no; ?>" required>
    </div>
    <button type="submit" name="search" class="btn btn-primary">Search</button>

    <?php if ($flight_no): ?>
        <div class="form-group">
            <h4>Origin</h4>
            <input type="text" name="origin" class="form-control" value="<?php echo $origin; ?>" required>
        </div>
        <div class="form-group">
            <h4>Destination</h4>
            <input type="text" name="destination" class="form-control" value="<?php echo $destination; ?>" required>
        </div>
        <div class="form-group">
            <h4>Distance</h4>
            <input type="text" name="distance" class="form-control" value="<?php echo $distance; ?>" required>
        </div>
        <div class="form-group">
            <h4>Fare</h4>
            <input type="text" name="fare" class="form-control" value="<?php echo $fare; ?>" required>
        </div>
        <div class="form-group">
            <h4>Class</h4>
            <input type="text" name="class" class="form-control" value="<?php echo $class; ?>" required>
        </div>
        <div class="form-group">
            <h4>Seats Available</h4>
            <input type="text" name="seats_available" class="form-control" value="<?php echo $seats_available; ?>" required>
        </div>
        <div class="form-group">
            <h4>Departs</h4>
            <input type="text" name="departs" class="form-control" value="<?php echo $departs; ?>" required>
        </div>
        <div class="form-group">
            <h4>Arrives</h4>
            <input type="text" name="arrives" class="form-control" value="<?php echo $arrives; ?>" required>
        </div>
        <div class="form-group">
            <h4>Operator</h4>
            <input type="text" name="operator" class="form-control" value="<?php echo $operator; ?>" required>
        </div>
        <div class="form-group">
            <h4>Origin Code</h4>
            <input type="text" name="origin_code" class="form-control" value="<?php echo $origin_code; ?>" required>
        </div>
        <div class="form-group">
            <h4>Destination Code</h4>
            <input type="text" name="destination_code" class="form-control" value="<?php echo $destination_code; ?>" required>
        </div>
        <div class="form-group">
            <h4>Refundable</h4>
            <input type="text" name="refundable" class="form-control" value="<?php echo $refundable; ?>" required>
        </div>
        <div class="form-group">
            <h4>Number of Bookings</h4>
            <input type="text" name="noOfBookings" class="form-control" value="<?php echo $noOfBookings; ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update Flight</button>
    <?php endif; ?>
</form>

<?php include("footer.html"); ?>
