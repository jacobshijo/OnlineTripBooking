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

<h2 class="text-center my-4">Delete Flight</h2>
<form method="post" action="">
    <div class="form-group">
        <h4>Flight ID</h4>
        <input type="text" name="flight_no" class="form-control" placeholder="Enter Flight ID" required>
    </div>
    <button type="submit" name="delete" class="btn btn-danger">Delete Flight</button>
</form>

<?php
if (isset($_POST['delete'])) {
    $flight_no = $_POST['flight_no'];
    $deleteQuery = "DELETE FROM flights WHERE flight_no = '$flight_no'";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "Flight deleted successfully.";
    } else {
        echo "Error deleting flight: " . mysqli_error($conn);
    }
}
?>

<?php include("footer.html"); ?>
