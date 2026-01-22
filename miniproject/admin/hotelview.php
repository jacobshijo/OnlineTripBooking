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
               
               $sql = "SELECT hotelID,hotelName,city,locality,stars,rating,hotelDesc,checkIn,checkOut,price,roomsAvailable,wifi,swimmingPool,parking,restaurant,laundry,cafe,mainImage FROM hotels";
               $result = $conn->query($sql);
               echo "<h2 class='text-center my-4'>Details of Hotels</h2>";
               echo "<br>";
               echo "<div class='col-xs-6'>
               <table class='table table-striped table-bordered table-hover py-5' style='width:150%; border: 2px solid black; text:white; text-align: center;'>
               <tr class='text-centre text-white'style='font-size:12px; background:black;'>
               <th>Hotel ID</th>
               <th>Hotel Name</th>
               <th>City</th>
               <th>Locality</th>
               <th>Stars</th>
               <th>Rating</th>
               <th>Check In</th>
               <th>Check Out</th>
               <th>Price</th>
               <th>Rooms available</th>
               <th>Wifi</th>
               <th>Swimming Pool</th>
               <th>Parking</th>
               <th>Laundry</th>
               <th>Cafe</th>
               
               </tr>
               </div>";
               
               if ($result->num_rows > 0) {
                   // output data of each row
                   while($row = $result->fetch_assoc()) {
               
                     echo "<tr>";
               echo "<td>" . $row['hotelID'] . "</td>";
               echo "<td>" . $row['hotelName'] . "</td>";
               echo "<td>" . $row['city'] . "</td>";
               echo "<td>" . $row['locality'] . "</td>";
               echo "<td>" . $row['stars'] . "</td>";
               echo "<td>" . $row['rating'] . "</td>";
               echo "<td>" . $row['checkIn'] . "</td>";
               echo "<td>" . $row['checkOut'] . "</td>";
               echo "<td>" . $row['price'] . "</td>";
               echo "<td>" . $row['roomsAvailable'] . "</td>";
               echo "<td>" . $row['wifi'] . "</td>";
               echo "<td>" . $row['swimmingPool'] . "</td>";
               echo "<td>" . $row['parking'] . "</td>";
               echo "<td>" . $row['laundry'] . "</td>";
               echo "<td>" . $row['cafe'] . "</td>";
               
               echo "</tr>";
               
               
                   }
               } else {
                   echo "0 results";
               }
               
               $conn->close();
               ?>

<?php include("footer.html") ?>