<?php include("header.html") ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (MySQLi_Sql_Exception $ex) {
    echo("Connection Error");
}
?>

<h2 class="text-center my-4">Delete User</h2>
<form method="post" action="">
    <h4>UserID</h4>
    <input type="text" name="UserID" class="form-control" placeholder="Enter UserID" required><br>
    <input type="submit" class="btn btn-danger btn-block btn-lg" name="delete" value="Delete User">
</form>

<?php
if (isset($_POST['delete'])) {
    $UserID = $_POST['UserID'];

    $delete_query = "DELETE FROM `users` WHERE UserID='$UserID'";

    try {
        $delete_result = mysqli_query($conn, $delete_query);
        if (mysqli_affected_rows($conn) > 0) {
            echo "User deleted successfully!";
        } else {
            echo "User not found!";
        }
    } catch (Exception $ex) {
        echo "Error deleting: " . $ex->getMessage();
    }
}
?>

<?php include("footer.html") ?>
