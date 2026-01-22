<?php include("header.html") ?>
               
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT bookingID,username,date,cancelled,origin,destination,passengers,type FROM flightbookings";
$result = $conn->query($sql);
echo "<h2 class='text-center my-4'>Flight Bookings</h2>";
echo "<br>";


if ($result->num_rows > 0) {

    echo "
    <center>
    <table class='table table-striped table-bordered table-hover py-5' style='width:150%; border: 2px solid black; text:white; text-align: center;'>
    <tr class='text-centre text-white'style='font-size:14px; background:black'>
    <th>Booking ID</th>
    <th>Username</th>
    <th>Date</th>
    <th>Cancelled</th>
    <th>Origin</th>
    <th>Destination</th>
    <th>Passengers</th>
    <th>Type</th>
    
    </tr>
    </center>";

    // output data of each row
    while($row = $result->fetch_assoc()) {

echo "<tr>";
echo "<td>" . $row['bookingID'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "<td>" . $row['cancelled'] . "</td>";
echo "<td>" . $row['origin'] . "</td>";
echo "<td>" . $row['destination'] . "</td>";
echo "<td>" . $row['passengers'] . "</td>";
echo "<td>" . $row['type'] . "</td>";

echo "</tr>";

    }
} else {
    echo "<center><h3>0 results</h3></center>";}

$conn->close();
?>

<?php include("footer.html") ?>