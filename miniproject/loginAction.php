<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Bookify | Login</title>
    
  <!-- favicon-->
  <link rel="shortcut icon" href="./images/company-logo.svg" type="image/svg+xml">

    <!-- Fonts and Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lucida+Sans:400,700" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: "Lucida Sans", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container-fluid {
            width: 100%;
            max-width: 500px;
            background: #fff;
            padding: 20px 30px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 10px;
            text-align: center;
        }

        .heading {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 20px;
            color: #333;
        }

        .text {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .button {
            padding: 10px 20px;
            border-radius: 20px;
            border: none;
            outline: none;
            cursor: pointer;
            background: teal;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .button:hover {
            background: #004d4d;
        }

        #countdown {
            font-weight: bold;
            color: teal;
        }

        a {
            text-decoration: none;
        }

        .messages {
            margin-top: 20px;
        }

        .containerBox {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            margin: auto;
        }
    </style>
</head>
<body>

<?php
require("php/PasswordHash.php");
$hasher = new PasswordHash(8, false);

$username = $_POST["username"];
$password = $_POST["password"];

$servername = "localhost";
$usernameConn = "root";
$passwordConn = "";
$dbname = "tourism";

// Creating a connection to MySQL database
$conn = new mysqli($servername, $usernameConn, $passwordConn, $dbname);

// Checking if we've successfully connected to the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Checking user details query
$getUserDataSQL = "SELECT * FROM `users` WHERE Username='$username'";
$getUserDataQuery = $conn->query($getUserDataSQL);
$getResult = $getUserDataQuery->fetch_assoc();

// Check if user exists and password is correct
if ($getResult && isset($getResult["Password"])) {
    $passwordFromDB = $getResult["Password"];
    $check = $hasher->CheckPassword($password, $passwordFromDB);

    if ($check) {
        $_SESSION["valid"] = true;
        $_SESSION["timeout"] = time();
        $_SESSION["username"] = $username;

?>
        <title>Logged In | tourism_management</title>
        <div class="container-fluid">
            <div class="heading">Log In Successful</div>
            <div class="text">
                You've logged in successfully.
                <br />
                Redirecting to the Home Screen in <span id="countdown">2</span> seconds...
            </div>
        </div>

        <script>
            // Countdown and redirect script
            let seconds = 2;
            const countdownElement = document.getElementById("countdown");

            const countdownInterval = setInterval(() => {
                seconds--;
                countdownElement.textContent = seconds;

                if (seconds <= 0) {
                    clearInterval(countdownInterval);
                    window.location.href = "index.php";
                }
            }, 1000);
        </script>
<?php 
    } else { ?>
        <title>Couldn't log in | tourism_management</title>
        <div class="container-fluid">
            <div class="heading">Log In Unsuccessful</div>
            <div class="containerBox">
                <div class="text">
                    Error logging in.
                    <br />
                    Please try again with the correct username and password.
                </div>
                <a href="login.php">
                    <button class="button">Try Again</button>
                </a>
            </div>
        </div>
<?php }
} else { ?>
    <title>Couldn't log in | tourism_management</title>
    <div class="container-fluid">
        <div class="heading">Log In Unsuccessful</div>
        <div class="containerBox">
            <div class="text">
                No such user found.
                <br />
                Please try again with the correct username.
            </div>
            <a href="login.php">
                <button class="button">Try Again</button>
            </a>
        </div>
    </div>
<?php } ?>

</body>
</html>
