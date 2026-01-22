<title>Bookify | SignUp</title>

  <!-- favicon-->
  <link rel="shortcut icon" href="./images/company-logo.svg" type="image/svg+xml">

<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Kolkata');

require("php/PasswordHash.php");
$hasher = new PasswordHash(8, false);

$fullName = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$username = $_POST["username"];
$password = $_POST["password"];
$addressLine1 = $_POST["addressLine1"];
$addressLine2 = $_POST["addressLine2"];
$city = $_POST["city"];
$state = $_POST["state"];
$date = date('l jS \of F Y \a\t h:i:s A'); // Current date and time

// Hash the password before storing it
$hash = $hasher->HashPassword($password);

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

// Check if the username already exists
$checkUserExistSQL = "SELECT * FROM `users` WHERE Username='$username'";
$checkUserExistQuery = $conn->query($checkUserExistSQL);
$getResult = $checkUserExistQuery->fetch_assoc();

if ($getResult == NULL) { // User doesn't exist, proceed with insertion
    // Insert user data into the database
    $insertDataSQL = "INSERT INTO `users`(FullName, EMail, Phone, Username, Password, AddressLine1, AddressLine2, City, State, Date) 
                      VALUES('$fullName', '$email', '$phone', '$username', '$hash', '$addressLine1', '$addressLine2', '$city', '$state', '$date')";
    $insertDataQuery = $conn->query($insertDataSQL);
    
    if ($insertDataQuery) {
        // Log the user in immediately after successful registration
        $_SESSION["valid"] = true;
        $_SESSION["timeout"] = time();
        $_SESSION["username"] = $username;
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <title>Sign Up Successful | tourism_management</title>
            <style>
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
                .container {
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
                    font-weight: bold;
                    margin-bottom: 20px;
                    color: #333;
                }
                .text {
                    font-size: 16px;
                    color: #555;
                }
                #countdown {
                    font-weight: bold;
                    color: teal;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="heading">Sign Up Successful</div>
                <div class="text">
                    Your account has been created successfully.
                    <br />
                    Redirecting to the dashboard in <span id="countdown">3</span> seconds...
                </div>
            </div>
            <script>
                let seconds = 3;
                const countdownElement = document.getElementById("countdown");
                const interval = setInterval(() => {
                    seconds--;
                    countdownElement.textContent = seconds;
                    if (seconds <= 0) {
                        clearInterval(interval);
                        window.location.href = "userDashboardProfile.php";
                    }
                }, 1000);
            </script>
        </body>
        </html>
        <?php
        exit();
    } else {
        // Registration failed
        displayError("Sorry, we couldn't sign you up. Please try again later.");
    }
} else {
    // Username already exists
    displayError("A user with this username already exists. You might want to log in instead.");
}

// Function to display error messages with styling
function displayError($message) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Sign Up Unsuccessful | tourism_management</title>
        <style>
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
            .container {
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
                font-weight: bold;
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
            a {
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="heading">Sign Up Unsuccessful</div>
            <div class="text"><?php echo $message; ?></div>
            <a href="signup.php">
                <button class="button">Try Again</button>
            </a>
        </div>
    </body>
    </html>
    <?php
    exit();
}
?>
