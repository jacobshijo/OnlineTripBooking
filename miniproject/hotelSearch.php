<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookify | Hotels</title>

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
/* General styling for search results container */
.searchHotels {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
  margin: 20px 0;
}

/* Styling for individual hotel listing */
.listItem {
  background-color: #f9f9f9;
  border: 1px solid #ddd;
  border-radius: 10px;
  height: 410px;
  width: 300px;
  padding: 15px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.listItem:hover {
  transform: scale(1.05);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

/* Styling for the image container */
.imageContainer img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 10px;
}

/* Hotel details container */
.hotelDetails {
  text-align: center;
}

/* Hotel name styling */
.hotelName {
  font-family: 'Montserrat', sans-serif;
  font-size: 1.2rem;
  font-weight: 700;
  color: #333;
  margin: 10px 0;
  margin-left: -5px;
  width: 280px;
}

/* Stars container */
.starContainer {
  margin: 10px 0;
  color: #ffc107;
}

/* Price container */
.priceContainer {
  font-size: 1.1rem;
  font-weight: 600;
  color: #2ecc71;
  margin: 10px 0;
}

/* Price note */
.priceNote {
  font-size: 0.9rem;
  color: #888;
  margin-bottom: 15px;
}

/* View details button */
.viewDetails {
  display: inline-block;
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 1rem;
  border-radius: 5px;
  cursor: pointer;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

.viewDetails:hover {
  background-color: #0056b3;
}

.query {
  font-size: 2rem; /* Adjust the font size for better readability */
  font-weight: bold; /* Make the text bold */
  color: white; /* Use a neutral color for the text */
  text-align: center; /* Center-align the text */
  padding: 20px; /* Add some padding around the text */
  margin-bottom: 20px; /* Add space below the section */
  margin-top: 80px;

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
        
	  <?php
		
			$city=$_GET["city"];
			$checkIn=$_GET["checkIn"];
			$checkOut=$_GET["checkOut"];
			$noOfRooms=$_GET["rooms"];
		
			if($noOfRooms=="1") {
				$room1=$_GET["room1"];
			}
			elseif($noOfRooms=="2") {
				$room1=$_GET["room1"];
				$room2=$_GET["room2"];
			}
			elseif($noOfRooms=="3") {
				$room1=$_GET["room1"];
				$room2=$_GET["room2"];
				$room3=$_GET["room3"];
			}
			elseif($noOfRooms=="4") {
				$room1=$_GET["room1"];
				$room2=$_GET["room2"];
				$room3=$_GET["room3"];
				$room4=$_GET["room4"];
			}
		
			$_SESSION["city"]=$city;
			$_SESSION["checkIn"]=$checkIn;
			$_SESSION["checkOut"]=$checkOut;
			$_SESSION["noOfRooms"]=$noOfRooms;
			
			if($noOfRooms=="1") {
				$_SESSION["room1"]=$room1;
				$_SESSION["noOfGuests"]=(int)$room1;
			}
			elseif($noOfRooms=="2") {
				$_SESSION["room1"]=$room1;
				$_SESSION["room2"]=$room2;
				$_SESSION["noOfGuests"]=(int)$room1+(int)$room2;
			}
			elseif($noOfRooms=="3") {
				$_SESSION["room1"]=$room1;
				$_SESSION["room2"]=$room2;
				$_SESSION["room3"]=$room3;
				$_SESSION["noOfGuests"]=(int)$room1+(int)$room2+(int)$room3;
			}
			elseif($noOfRooms=="4") {
				$_SESSION["room1"]=$room1;
				$_SESSION["room2"]=$room2;
				$_SESSION["room3"]=$room3;
				$_SESSION["room4"]=$room4;
				$_SESSION["noOfGuests"]=(int)$room1+(int)$room2+(int)$room3+(int)$room4;
			}
		
		?>
		
		<div class="spacer"></div>
		
		<div class="searchHotels">
					
			
			

		<?php
		
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "tourism";
			
			// Creating a connection to MySQL database
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Checking if we've successfully connected to the database
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
		
			$sql = "SELECT * FROM hotels WHERE city='$city'";
			$rowcount = mysqli_num_rows(mysqli_query($conn,$sql));
			
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				
		?>
		
    <div class="query">
						
				Hotels in <?php echo $city; ?>	
						
			</div>
			
		</div> <!-- search hotels -->
		
		<div class="col-sm-12 searchHotels">
		
		<?php
				while($row = $result->fetch_assoc()) {
        			
		?>
					
					<div class="col-sm-4 text-center">
  <div class="col-sm-12 listItem">
    <!-- Hotel image -->
    <div class="col-sm-12 imageContainer text-center">
      <img src="<?php echo $row["mainImage"]; ?>" alt="<?php echo $row["hotelName"]; ?>">
    </div>
    <!-- Hotel details -->
    <div class="hotelDetails">
      <div class="col-sm-12 hotelName"><?php echo $row["hotelName"]; ?></div>
      <div class="col-sm-12 starContainer">
        <?php
          $noOfStars = $row["stars"];
          for ($i = 0; $i < $noOfStars; $i++) {
            echo '⭐';
          }
        ?>
      </div>
      <div class="col-sm-12 priceContainer">
        ₹ <?php echo $row["price"]; ?>
      </div>
      <div class="col-sm-12 priceNote">per room per night</div>
      <div class="col-sm-12 view">
        <a href="hotelDetails.php?hotelId=<?php echo $row["hotelID"]; ?>">
          <input type="button" class="viewDetails" name="viewDetails" value="View Hotel Details" />
        </a>
      </div>
    </div>
  </div>
</div>

   		

   		<?php
    			
				} ?>
				
				</div>
			
		<?php	} else {
    			
		?>
		
		<div class="col-sm-12 searchHotels">
		
			<div class="query">
			
				No hotels found.
			
			</div>
		
		</div>
		
		<?php
			
			}
		
		?>
		
		<?php $conn->close(); //closing the connection to the database ?>

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
