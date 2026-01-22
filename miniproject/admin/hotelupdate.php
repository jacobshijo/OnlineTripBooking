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

$hotelID = $hotelName = $city = $locality = $stars = $rating = $hotelDesc = $checkIn = $checkOut = $price = $roomsAvailable = $wifi = $swimmingPool = $parking = $restaurant = $laundry = $cafe = $mainImage = "";

if (isset($_POST['search'])) {
    $hotelID = $_POST['hotelID'];
    $query = "SELECT * FROM hotels WHERE hotelID = '$hotelID'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        extract($row);
    } else {
        echo "Hotel not found.";
    }
}

if (isset($_POST['update'])) {
    $hotelID = $_POST['hotelID'];
    $hotelName = $_POST['hotelName'];
    $city = $_POST['city'];
    $locality = $_POST['locality'];
    $stars = $_POST['stars'];
    $rating = $_POST['rating'];
    $hotelDesc = $_POST['hotelDesc'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $price = $_POST['price'];
    $roomsAvailable = $_POST['roomsAvailable'];
    $wifi = $_POST['wifi'];
    $swimmingPool = $_POST['swimmingPool'];
    $parking = $_POST['parking'];
    $restaurant = $_POST['restaurant'];
    $laundry = $_POST['laundry'];
    $cafe = $_POST['cafe'];

    $updateQuery = "UPDATE hotels SET hotelName='$hotelName', city='$city', locality='$locality', stars='$stars', rating='$rating', hotelDesc='$hotelDesc', checkIn='$checkIn', checkOut='$checkOut', price='$price', roomsAvailable='$roomsAvailable', wifi='$wifi', swimmingPool='$swimmingPool', parking='$parking', restaurant='$restaurant', laundry='$laundry', cafe='$cafe' WHERE hotelID='$hotelID'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "Hotel details updated successfully.";
    } else {
        echo "Error updating hotel: " . mysqli_error($conn);
    }
}
?>

<h2 class="text-center my-4">Update Hotel</h2>
<form method="post" action="">
    <div class="form-group">
        <h4>Hotel ID</h4>
        <input type="text" name="hotelID" class="form-control" placeholder="Enter Hotel ID" value="<?php echo $hotelID; ?>" required>
    </div>
    <button type="submit" name="search" class="btn btn-primary">Search</button>

    <?php if ($hotelID): ?>
        <div class="form-group">
            <h4>Hotel Name</h4>
            <input type="text" name="hotelName" class="form-control" value="<?php echo $hotelName; ?>" required>
        </div>
        <div class="form-group">
            <h4>City</h4>
            <input type="text" name="city" class="form-control" value="<?php echo $city; ?>" required>
        </div>
        
        <div class="col-xs-6">
            <h4>Locality</h4>
            <input type="text" name="locality" class="form-control" value="<?php echo $locality; ?>" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Stars</h4>
            <input type="text" name="stars" class="form-control" value="<?php echo $stars; ?>" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Rating</h4>
            <input type="text" name="rating" class="form-control" value="<?php echo $rating; ?>" required><br>
        </div>
        
        <div class="col-xs-6">
            <h4>Description</h4>
            <input type="text" name="hotelDesc" class="form-control" value="<?php echo $hotelDesc; ?>" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Check In</h4>
            <input type="text" name="checkIn" class="form-control" value="<?php echo $checkIn; ?>" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Check Out</h4>
            <input type="text" name="checkOut" class="form-control" value="<?php echo $checkOut; ?>" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Price</h4>
            <input type="text" name="price" class="form-control" value="<?php echo $price; ?>" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Wifi</h4>
            <input type="text" name="wifi" class="form-control" value="<?php echo $wifi; ?>" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Swimming Pool</h4>
            <input type="text" name="swimmingPool" class="form-control" value="<?php echo $swimmingPool; ?>" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Parking</h4>
            <input type="text" name="parking" class="form-control" value="<?php echo $parking; ?>" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Restaurant</h4>
            <input type="text" name="restaurant" class="form-control" value="<?php echo $restaurant; ?>" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Laundry</h4>
            <input type="text" name="laundry" class="form-control" value="<?php echo $laundry; ?>" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Cafe</h4>
            <input type="text" name="cafe" class="form-control" value="<?php echo $cafe; ?>" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Image</h4>
            <input type="file" name="mainImage" class="form-control" accept="image/*" ><br>
        </div>

        <button type="submit" name="update" class="btn btn-success">Update Hotel</button>
    <?php endif; ?>
</form>

<?php include("footer.html"); ?>
