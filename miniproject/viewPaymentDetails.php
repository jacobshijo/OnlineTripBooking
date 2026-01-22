<?php session_start();

if(!isset($_SESSION["username"]))
{
    	header("Location:blocked.php");
   		$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookify | Payment Details</title>

  <!-- favicon-->
  <link rel="shortcut icon" href="./images/company-logo.svg" type="image/svg+xml">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">

	<style>
		body {
  font-family: 'Poppins', sans-serif;
  background-color: #f0f0f0;
}

.container-fluid {
  display: flex;
  justify-content: center;
  padding: 20px;
}

.userDashboard {
  background-color: #3b3b3b;
  border-radius: 10px;
  overflow: hidden;
  display: flex;
  color: #fff;
  width: 1000px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.containerBoxLeft {
  width: 30%;
  background-color: #2b2b2b;
  padding: 20px;
}

.menuContainer {
  padding: 15px 10px;
  margin-bottom: 10px;
  display: flex;
  align-items: center;
  font-size: 16px;
  cursor: pointer;
  border-bottom: 1px solid #494949;
  color: #fff;
}

.menuContainer.active,
.menuContainer:hover {
  color: #e74c3c;
}

.menuContainer span {
  margin-right: 10px;
}

.containerBoxRight {
  width: 90%;
  padding: 20px;
  margin-right: -60px;
}

.profileWrapper {
  display: grid;
  grid-template-columns: auto 1fr;
  gap: 10px 20px;
  text-align: left;
  margin-bottom: 15px;
}

.profileWrapper .tag {
  font-weight: 600;
  margin-right: 3px;
}

.profileWrapper .content {
  font-weight: 400;
  color: #dcdcdc;
  padding: 3px 2px;
  border-radius: 5px;
  text-align: left;
}

	</style>

</head>

<body id="top">

  <!-- Header -->
  <?php
    if(!isset($_SESSION["username"])) {
      include("header/headerLoggedOut.php");
    }
    else {
      include("header/headerLoggedIn.php");
    }
  ?>

  <main>
    <article>
      <!-- Hero Section -->
	  <section class="hero" id="about-us">
  <div class="container-fluid">
    <div class="userDashboard">
      <!-- Left Navigation Menu -->
      <div class="containerBoxLeft">
        <div class="menuContainer active">
          <span class="fa fa-user-o"></span> Payment Details
        </div>
          

      </div>

            <div class="col-sm-7 containerBoxRight text-left">
<div class="col-sm-7 containerBoxRight text-left">				
				<div class="col-sm-12 settings">
					
        <div class="col-sm-6 profileWrapper topMargin">
					<span class="tag">Last payment details </span>
				</div>

					<div class="col-sm-6 profileWrapper topMargin">
					<span class="content">Booking Type: </span><span class="content"><?php echo $_SESSION["P_mode"]; ?> </span>
					</div>  
          
                    <div class="col-sm-6 profileWrapper topMargin">
					<span class="content">Payment Type: </span><span class="content">Card Payment </span>
					</div>

                    <div class="col-sm-6 profileWrapper topMargin">
					<span class="content">Card Holder Name: </span><span class="content"><?php echo $_SESSION["P_name"]; ?> </span>
					</div>
                
                    <div class="col-sm-6 profileWrapper topMargin">
					<span class="content">Card Number: </span><span class="content"><?php echo $_SESSION["P_card"]; ?> </span>
					</div>

                    <div class="col-sm-6 profileWrapper topMargin">
					<span class="content">Card's Expiry Date: </span><span class="content"><?php echo $_SESSION["P_expiry"]; ?> </span>
					</div>

                    <div class="col-sm-6 profileWrapper topMargin">
					<span class="content">Amount Paid: </span><span class="content"><?php echo $_SESSION["P_price"]; ?> </span>
					</div>   

				</div>
				
			</div>

      </div>
    </div>
  </div>
</section>

  <!-- Footer -->
  <?php include("header/footer.php"); ?>

  <!-- Back to Top -->
  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>

  <!-- Custom JavaScript -->
  <script src="./assets/js/script.js"></script>

  <!-- Ionicons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>

</html>
