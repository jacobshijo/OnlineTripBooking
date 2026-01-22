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
               
               $sql = "SELECT UserID,FullName,EMail,Phone,Username,Password,AddressLine1,AddressLine2,City,State,Date FROM users";
               $result = $conn->query($sql);
               echo "<h2 class='text-center my-4'>Details of Users</h2>";
               echo "<br>";
               echo "<div class='col-xs-6'>
               <table class='table table-striped table-bordered table-hover py-5' style='width:150%; border: 2px solid black; text:white; text-align: center;'>
               <tr class='text-centre text-white'style='font-size:14px; background:black;'>
               <th>UserID</th>
               <th>FullName</th>
               <th>EMail</th>
               <th>Phone</th>
               <th>Username</th>
               <th>AddressLine1</th>
               <th>AddressLine2</th>
               <th>City</th>
               <th>State</th>
               <th>Date of Joining</th>
               
               </tr>
               </div>";
               
               if ($result->num_rows > 0) {
                   // output data of each row
                   while($row = $result->fetch_assoc()) {
               
                     echo "<tr>";
               echo "<td>" . $row['UserID'] . "</td>";
               echo "<td>" . $row['FullName'] . "</td>";
               echo "<td>" . $row['EMail'] . "</td>";
               echo "<td>" . $row['Phone'] . "</td>";
               echo "<td>" . $row['Username'] . "</td>";
               echo "<td>" . $row['AddressLine1'] . "</td>";
               echo "<td>" . $row['AddressLine2'] . "</td>";
               echo "<td>" . $row['City'] . "</td>";
               echo "<td>" . $row['State'] . "</td>";
               echo "<td>" . $row['Date'] . "</td>";
               
               echo "</tr>";
               
               
                   }
               } else {
                   echo "0 results";
               }
               
               $conn->close();
               ?>

            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>
   </body>
</html>