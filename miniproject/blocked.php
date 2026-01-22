<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Bookify | Blocked</title>
    
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
            max-width: 400px;
            background: #fff;
            padding: 20px 30px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 10px;
            text-align: center;
        }

        .heading {
            font-size: 24px;
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

        a {
            text-decoration: none;
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

<div class="container-fluid">
    <div class="heading">Blocked</div>
    <div class="containerBox">
        <div class="text">
            You need to be logged in to access this page.
            <br />
            Please login with a valid account to continue.
        </div>
        <a href="login.php">
            <button class="button">Login</button>
        </a>
    </div>
</div>

</body>
</html>
