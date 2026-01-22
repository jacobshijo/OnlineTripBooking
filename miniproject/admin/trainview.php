<?php include("header.html") ?>

<style>
   .table-responsive {
    /* overflow-x: auto; */
    width: 100%;
}

table {
    min-width: 1500px; /* Wider than the viewport to force horizontal scrolling */
    width: auto;
    border-collapse: collapse;
}

th, td {
    padding: 8px;
    text-align: center;
}



.full_container, .inner_container, #content {
    width: 100%;
    overflow: visible; /* Ensure no conflict with natural scrolling */
}


#content {
    width: 100%;
    overflow-x: auto;
}


body {
    overflow-x: auto; /* Allow horizontal scrolling */
}

</style>
               
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
               
               $sql = "SELECT trainNo,region,returnTrainNo,trainName,origin,destination,originCode,destinationCode,originTime,destinationTime,originPlatform,destinationPlatform,duration,classes,seats1AC,seats2AC,seats3AC,seatsSL,seatsChairCar,seatsChairCarAC,price1AC,price2AC,price3AC,priceSL,priceChairCar,priceChairCarAC,runsOn,noOfBookings FROM trains";
               $result = $conn->query($sql);
               echo "<h2 class='text-center my-4'>Details of Trains</h2>";
               echo "<br>";
               echo "<div class='content'>
               <div class='col-xs-6'>
               
               <table class='table table-striped table-bordered table-hover py-5' style='width:150%; border: 2px solid black; text:white; text-align: center;'>
               <tr class='text-centre text-white'style='font-size:12px; background:black;'>
               <th>Train No.</th>
               <th>Region</th>
               <th>Return Train No.</th>
               <th>Train Name</th>
               <th>Origin</th>
               <th>Destination</th>
               <th>Origin Code</th>
               <th>Destination Code</th>
               <th>Origin Time</th>
               <th>Destination Time</th>
               <th>Origin Platform</th>
               <th>Destination Platform</th>
               <th>Duration</th>
               <th>Classes</th>
               <th>Seats1AC</th>
               <th>Seats2AC</th>
               <th>Seats3AC</th>
               <th>SeatsSL</th>
               <th>SeatsChairCar</th>
               <th>SeatsChairCarAC</th>
               <th>price1AC</th>
               <th>price2AC</th>
               <th>price3AC</th>
               <th>priceSL</th>
               <th>priceChairCar</th>
               <th>priceChairCarAC</th>
               <th>runsOn</th>
               <th>No. of bookings</th>
               
               </tr>
               </div>";
               
               if ($result->num_rows > 0) {
                   // output data of each row
                   while($row = $result->fetch_assoc()) {
               
                     echo "<tr>";
               echo "<td>" . $row['trainNo'] . "</td>";
               echo "<td>" . $row['region'] . "</td>";
               echo "<td>" . $row['returnTrainNo'] . "</td>";
               echo "<td>" . $row['trainName'] . "</td>";
               echo "<td>" . $row['origin'] . "</td>";
               echo "<td>" . $row['destination'] . "</td>";
               echo "<td>" . $row['originCode'] . "</td>";
               echo "<td>" . $row['destinationCode'] . "</td>";
               echo "<td>" . $row['originTime'] . "</td>";
               echo "<td>" . $row['destinationTime'] . "</td>";
               echo "<td>" . $row['originPlatform'] . "</td>";
               echo "<td>" . $row['destinationPlatform'] . "</td>";
               echo "<td>" . $row['duration'] . "</td>";
               echo "<td>" . $row['classes'] . "</td>";
               echo "<td>" . $row['seats1AC'] . "</td>";
               echo "<td>" . $row['seats2AC'] . "</td>";
               echo "<td>" . $row['seats3AC'] . "</td>";
               echo "<td>" . $row['seatsSL'] . "</td>";
               echo "<td>" . $row['seatsChairCar'] . "</td>";
               echo "<td>" . $row['seatsChairCarAC'] . "</td>";
               echo "<td>" . $row['price1AC'] . "</td>";
               echo "<td>" . $row['price2AC'] . "</td>";
               echo "<td>" . $row['price3AC'] . "</td>";
               echo "<td>" . $row['priceSL'] . "</td>";
               echo "<td>" . $row['priceChairCar'] . "</td>";
               echo "<td>" . $row['priceChairCarAC'] . "</td>";
               echo "<td>" . $row['runsOn'] . "</td>";
               echo "<td>" . $row['noOfBookings'] . "</td>";
               
               echo "</tr>";
                   }
                   echo "</table>";
               echo "</div>";
               } else {
                   echo "0 results";
               }
               
               $conn->close();
               ?>

<?php include("footer.html") ?>