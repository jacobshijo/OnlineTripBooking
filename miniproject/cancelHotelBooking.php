<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate the booking ID
if (isset($_GET['bookingID']) && is_numeric($_GET['bookingID'])) {
    $bookingID = $_GET['bookingID'];
    $user = $_SESSION['username'];

    // Check if the booking exists and belongs to the logged-in user
    $checkSQL = "SELECT * FROM `hotelbookings` WHERE bookingID='$bookingID' AND username='$user' AND cancelled='no'";
    $checkQuery = $conn->query($checkSQL);

    if ($checkQuery->num_rows > 0) {
        // Update the booking to mark it as canceled
        $cancelSQL = "UPDATE `hotelbookings` SET cancelled='yes' WHERE bookingID='$bookingID'";
        if ($conn->query($cancelSQL) === TRUE) {
            $_SESSION['message'] = "Booking canceled successfully.";
        } else {
            $_SESSION['message'] = "Error: Unable to cancel the booking. Please try again.";
        }
    } else {
        $_SESSION['message'] = "Invalid booking ID or booking cannot be canceled.";
    }
} else {
    $_SESSION['message'] = "Invalid request. Booking ID is missing or incorrect.";
}

$conn->close();

// Redirect back to the dashboard or bookings page
header("Location: userDashboardHotelBookings.php");
exit();
?>
