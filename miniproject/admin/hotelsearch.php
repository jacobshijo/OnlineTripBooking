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

$hotelID = $hotelName = $city = $locality = $stars = $rating = $hotelDesc = "";
?>

<h2 class="text-center my-4">Search Hotel</h2>
<form method="post" action="">
    <div class="form-group">
        <h4>Hotel ID</h4>
        <input type="text" name="hotelID" class="form-control" placeholder="Enter Hotel ID" required>
    </div>
    <button type="submit" name="search" class="btn btn-primary">Search</button>
</form>

<?php
if (isset($_POST['search'])) {
    $hotelID = $_POST['hotelID'];
    $query = "SELECT * FROM hotels WHERE hotelID = '$hotelID'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    } else {
        echo "Hotel not found.";
    }
}
?>

<?php include("footer.html"); ?>
