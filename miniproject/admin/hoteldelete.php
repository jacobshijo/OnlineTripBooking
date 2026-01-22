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
?>

<h2 class="text-center my-4">Delete Hotel</h2>
<form method="post" action="">
    <div class="form-group">
        <h4>Hotel ID</h4>
        <input type="text" name="hotelID" class="form-control" placeholder="Enter Hotel ID" required>
    </div>
    <button type="submit" name="delete" class="btn btn-danger">Delete Hotel</button>
</form>

<?php
if (isset($_POST['delete'])) {
    $hotelID = $_POST['hotelID'];
    $deleteQuery = "DELETE FROM hotels WHERE hotelID = '$hotelID'";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "Hotel deleted successfully.";
    } else {
        echo "Error deleting hotel: " . mysqli_error($conn);
    }
}
?>

<?php include("footer.html"); ?>
