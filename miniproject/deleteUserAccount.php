<?php 
session_start();
if (!isset($_SESSION["username"])) {
    header("Location:blocked.php");
    $_SESSION['url'] = $_SERVER['REQUEST_URI'];
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

// Creating a connection to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking if successfully connected to the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['confirmLogout'])) {
    $user = $_SESSION["username"];

    // Delete user data securely using prepared statements
    $tables = ['users', 'flightbookings', 'hotelbookings', 'trainbookings'];
    foreach ($tables as $table) {
        $stmt = $conn->prepare("DELETE FROM `$table` WHERE Username = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        if ($stmt->error) {
            die("Error deleting from $table: " . $stmt->error);
        }
    }

    // Destroy session
    unset($_SESSION["username"]);
    unset($_SESSION["password"]);
    session_destroy();

    $loggedOut = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Bookify | Delete Account</title>
    
<!-- favicon-->
<link rel="shortcut icon" href="./images/company-logo.svg" type="image/svg+xml">

    <!-- Fonts and Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lucida+Sans:400,700" rel="stylesheet">
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

        .card {
  overflow: hidden;
  position: relative;
  background-color: #ffffff;
  text-align: left;
  border-radius: 0.5rem;
  max-width: 290px;
  box-shadow:
    0 20px 25px -5px rgba(0, 0, 0, 0.1),
    0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.header {
  padding: 1.25rem 1rem 1rem 1rem;
  background-color: #ffffff;
}

.image {
  display: flex;
  margin-left: auto;
  margin-right: auto;
  background-color: #fee2e2;
  flex-shrink: 0;
  justify-content: center;
  align-items: center;
  width: 3rem;
  height: 3rem;
  border-radius: 9999px;
}

.image svg {
  color: #dc2626;
  width: 1.5rem;
  height: 1.5rem;
}

.content {
  margin-top: 0.75rem;
  text-align: center;
}

.title {
  color: #111827;
  font-size: 1rem;
  font-weight: 600;
  line-height: 1.5rem;
}

.message {
  margin-top: 0.5rem;
  color: #6b7280;
  font-size: 0.875rem;
  line-height: 1.25rem;
}

.actions {
  margin: 0.75rem 1rem;
  background-color: #f9fafb;
}

.desactivate {
  display: inline-flex;
  padding: 0.5rem 1rem;
  background-color: #dc2626;
  color: #ffffff;
  font-size: 1rem;
  line-height: 1.5rem;
  font-weight: 500;
  justify-content: center;
  width: 100%;
  border-radius: 0.375rem;
  border-width: 1px;
  border-color: transparent;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

.cancel {
  display: inline-flex;
  margin-top: 0.75rem;
  padding: 0.5rem 1rem;
  background-color: #ffffff;
  color: #374151;
  font-size: 1rem;
  line-height: 1.5rem;
  font-weight: 500;
  justify-content: center;
  width: 100%;
  border-radius: 0.375rem;
  border: 1px solid #d1d5db;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}


    </style>
</head>

<body>

<?php if (isset($loggedOut) && $loggedOut): ?>
    <div class="container-fluid">
        <div class="heading">Account Deletion Successful</div>
        <div class="text">
            <br />
            Redirecting to the home page in <span id="countdown">2</span> seconds...
        </div>
    </div>
    <script>
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
    <div class="card">
    <div class="header">
      <div class="image">
        <svg
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          aria-hidden="true"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"
          ></path>
        </svg>
      </div>
      <div class="content">
        <span class="title">Deactivate account</span>
        <p class="message">
          Are you sure you want to deactivate your account? All of your data will
          be permanently removed. This action cannot be undone.
        </p>
      </div>
      <div class="actions">
        <div>
          <form method="post">
              <button type="submit" class="desactivate" name="confirmLogout">Yes, Delete</button>
          </form>
          <form action="userDashboardAccountSettings.php" method="get">
              <button class="cancel" type="submit">Cancel</button>
          </form>
      </div>
      </div>
    </div>
  </div>
<?php endif; ?>

</body>
</html>
