<?php include("header.html") ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";
$UserID = "";
$FullName = "";
$EMail = "";
$Phone = "";
$Username = "";
$Password = "";
$AddressLine1 = "";
$AddressLine2 = "";
$City = "";
$State = "";
$Date = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Connect to MySQL database
try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (MySQLi_Sql_Exception $ex) {
    echo "Connection Error";
}

// Fetch original data for the given UserID
if (isset($_POST['fetch'])) {
    $UserID = $_POST['UserID'];
    $fetch_query = "SELECT * FROM users WHERE UserID = '$UserID'";
    $fetch_result = mysqli_query($conn, $fetch_query);

    if ($fetch_result) {
        if (mysqli_num_rows($fetch_result) > 0) {
            $row = mysqli_fetch_array($fetch_result);
            $FullName = $row['FullName'];
            $EMail = $row['EMail'];
            $Phone = $row['Phone'];
            $Username = $row['Username'];
            $Password = $row['Password'];
            $AddressLine1 = $row['AddressLine1'];
            $AddressLine2 = $row['AddressLine2'];
            $City = $row['City'];
            $State = $row['State'];
            $Date = $row['Date'];
        } else {
            echo "No user found with the given UserID.";
        }
    } else {
        echo "Error fetching data.";
    }
}

// Update data in the database
if (isset($_POST['update'])) {
    $UserID = $_POST['UserID'];
    $FullName = $_POST['FullName'];
    $EMail = $_POST['EMail'];
    $Phone = $_POST['Phone'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $AddressLine1 = $_POST['AddressLine1'];
    $AddressLine2 = $_POST['AddressLine2'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $Date = $_POST['Date'];

    $update_query = "UPDATE `users` SET FullName='$FullName', EMail='$EMail', Phone='$Phone', Username='$Username', Password='$Password', AddressLine1='$AddressLine1', AddressLine2='$AddressLine2', City='$City', State='$State', Date='$Date' WHERE UserID = '$UserID'";
    try {
        $update_result = mysqli_query($conn, $update_query);
        if ($update_result) {
            if (mysqli_affected_rows($conn) > 0) {
                echo "Data updated successfully.";
            } else {
                echo "No changes made to the data.";
            }
        }
    } catch (Exception $ex) {
        echo "Error updating data: " . $ex->getMessage();
    }
}
?>

<h2 class="text-center my-4">Update User</h2>
<form method="post" action="">
    <div class="col-xs-6">
        <h4>UserID</h4>
        <input type="text" name="UserID" class="form-control" placeholder="Enter UserID to fetch data" required value="<?php echo $UserID; ?>">
        <br>
        <input type="submit" name="fetch" value="Fetch Data" class="btn btn-primary">
    </div>
</form>

<?php if (!empty($UserID)) { ?>
    <form method="post" action="">
        <input type="hidden" name="UserID" value="<?php echo $UserID; ?>">
        <div class="col-xs-6">
            <h4>Full Name</h4>
            <input type="text" name="FullName" class="form-control" value="<?php echo $FullName; ?>" required>
            <br>
        </div>

        <div class="col-xs-6">
            <h4>Email</h4>
            <input type="email" name="EMail" class="form-control" value="<?php echo $EMail; ?>" required>
            <br>
        </div>

        <div class="col-xs-6">
            <h4>Phone (10-digit)</h4>
            <input type="tel" pattern="^\d{10}$" name="Phone" class="form-control" value="<?php echo $Phone; ?>" required>
            <br>
        </div>

        <div class="col-xs-6">
            <h4>Username</h4>
            <input type="text" name="Username" class="form-control" value="<?php echo $Username; ?>" required>
            <br>
        </div>

        <div class="col-xs-6">
            <h4>Password</h4>
            <input type="password" name="Password" class="form-control" value="<?php echo $Password; ?>" required>
            <br>
        </div>

        <div class="col-xs-6">
            <h4>Address Line 1</h4>
            <input type="text" name="AddressLine1" class="form-control" value="<?php echo $AddressLine1; ?>" required>
            <br>
        </div>

        <div class="col-xs-6">
            <h4>Address Line 2</h4>
            <input type="text" name="AddressLine2" class="form-control" value="<?php echo $AddressLine2; ?>">
            <br>
        </div>

        <div class="col-xs-6">
            <h4>City</h4>
            <input type="text" name="City" class="form-control" value="<?php echo $City; ?>" required>
            <br>
        </div>

        <div class="col-xs-6">
            <h4>State</h4>
            <input type="text" name="State" class="form-control" value="<?php echo $State; ?>" required>
            <br>
        </div>

        <div class="col-xs-6">
            <h4>Date</h4>
            <input type="text" name="Date" class="form-control" value="<?php echo $Date; ?>" required>
            <br>
        </div>

        <div>
            <input type="submit" class="btn btn-success btn-block btn-lg" name="update" value="Update User">
        </div>
    </form>
<?php } ?>


<?php include("footer.html") ?>
