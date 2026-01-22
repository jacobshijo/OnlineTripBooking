<?php session_start();
if(!isset($_SESSION["username"]))
{
    	header("Location:blocked.php");
   		$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>

<?php

    if (isset($_POST['confirmLogout'])) {
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        $loggedOut = true;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Bookify | LogOut</title>

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
            margin: 5px;
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

        form {
            display: inline;
        }
    </style>
</head>

<body>

<?php if (isset($loggedOut) && $loggedOut): ?>
    <!-- Success message with countdown after confirming logout -->
    <div class="container-fluid">
        <div class="heading">Log Out Successful</div>
        <div class="text">
            You've logged out successfully.
            <br /><br />
            Redirecting to the home page in <span id="countdown">2</span> seconds...
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

<?php else: ?>
    <!-- Logout confirmation message -->
    <div class="container-fluid">
        <div class="heading">Confirm Log Out</div>
        <div class="text">Are you sure you want to log out?</div>
        <div>
            <form method="post">
                <button type="submit" class="button" name="confirmLogout">Yes, Log Out</button>
            </form>
            <a href="./index.php">
                <button class="button">Cancel</button>
            </a>
        </div>
    </div>
<?php endif; ?>

</body>
</html>
