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

<h2 class="text-center my-4">Delete Train</h2>
<form method="post" action="">
    <div class="form-group">
        <h4>Train ID</h4>
        <input type="text" name="trainNo" class="form-control" placeholder="Enter Train ID" required>
    </div>
    <button type="submit" name="delete" class="btn btn-danger">Delete Train</button>
</form>

<?php
if (isset($_POST['delete'])) {
    $trainNo = $_POST['trainNo'];
    $deleteQuery = "DELETE FROM trains WHERE trainNo = '$trainNo'";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "Train deleted successfully.";
    } else {
        echo "Error deleting train: " . mysqli_error($conn);
    }
}
?>

<?php include("footer.html"); ?>
