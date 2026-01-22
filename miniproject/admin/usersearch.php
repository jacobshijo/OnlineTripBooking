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

<h2 class="text-center my-4">Search User</h2>
<form method="post" action="">
    <h4>UserID</h4>
    <input type="text" name="UserID" class="form-control" placeholder="Enter UserID" required><br>
    <input type="submit" class="btn btn-info btn-block btn-lg" name="search" value="Search User">
</form>

<?php
if (isset($_POST['search'])) {
    $UserID = $_POST['UserID'];

    $search_query = "SELECT * FROM `users` WHERE UserID='$UserID'";

    $search_result = mysqli_query($conn, $search_query);
    if (mysqli_num_rows($search_result) > 0) {
        $row = mysqli_fetch_assoc($search_result);
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    } else {
        echo "User not found!";
    }
}
?>



<?php include("footer.html") ?>
