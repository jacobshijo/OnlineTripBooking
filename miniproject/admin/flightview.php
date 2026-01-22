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
               
               $sql = "SELECT flight_no,origin,destination,distance,fare,class,seats_available,departs,arrives,operator,origin_code,destination_code,refundable,noOfBookings FROM flights";
               $result = $conn->query($sql);
               echo "<h2 class='text-center my-4'>Details of Flights</h2>";
               echo "<br>";
               echo "<div class='content'>
               <div class='col-xs-6'>
               <table class='table table-striped table-bordered table-hover py-5' style='width:150%; border: 2px solid black; text:white; text-align: center;'>
               <tr class='text-centre text-white'style='font-size:14px; background:black;'>
               <th>Flight No.</th>
               <th>Origin</th>
               <th>Destination</th>
               <th>Distance</th>
               <th>Fare</th>
               <th>Class</th>
               <th>Seats_Available</th>
               <th>Departure</th>
               <th>Arrival</th>
               <th>Operator</th>
               <th>Origin code</th>
               <th>Destination code</th>
               <th>Refundable</th>
               <th>No. of bookings</th>
               
               </tr>
               </div>";
               
               if ($result->num_rows > 0) {
                   // output data of each row
                   while($row = $result->fetch_assoc()) {
               
                     echo "<tr>";
               echo "<td>" . $row['flight_no'] . "</td>";
               echo "<td>" . $row['origin'] . "</td>";
               echo "<td>" . $row['destination'] . "</td>";
               echo "<td>" . $row['distance'] . "</td>";
               echo "<td>" . $row['fare'] . "</td>";
               echo "<td>" . $row['class'] . "</td>";
               echo "<td>" . $row['seats_available'] . "</td>";
               echo "<td>" . $row['departs'] . "</td>";
               echo "<td>" . $row['arrives'] . "</td>";
               echo "<td>" . $row['operator'] . "</td>";
               echo "<td>" . $row['origin_code'] . "</td>";
               echo "<td>" . $row['destination_code'] . "</td>";
               echo "<td>" . $row['refundable'] . "</td>";
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