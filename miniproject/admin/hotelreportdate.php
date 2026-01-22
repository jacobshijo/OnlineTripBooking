<?php
   // Database connection
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "tourism";

   $conn = new mysqli($servername, $username, $password, $dbname);
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
?>

<?php include("header.html") ?>
               

               <div class="container">
         <h2 class="text-center my-4">Date-wise Report on booking of Hotels</h2>
         <form method="POST" action="">
            <div class="form-group">
               <label for="city">Select City:</label>
               <select class="form-control" id="city" name="city" onchange="this.form.submit()">
                  <option value="">-- Select City --</option>
                  <?php
                  $city_query = "SELECT DISTINCT city FROM hotels";
                  $city_result = $conn->query($city_query);
                  while ($row = $city_result->fetch_assoc()) {
                      $selected = ($_POST['city'] ?? '') == $row['city'] ? 'selected' : '';
                      echo "<option value='" . $row['city'] . "' $selected>" . $row['city'] . "</option>";
                  }
                  ?>
               </select>
            </div>
         </form>

         <?php if (!empty($_POST['city'])) { ?>
         <form method="POST" action="">
            <div class="form-group">
               <label for="hotel">Select Hotel:</label>
               <select class="form-control" id="hotel" name="hotel_id" onchange="this.form.submit()">
                  <option value="">-- Select Hotel --</option>
                  <?php
                  $city = $_POST['city'];
                  $hotel_query = "SELECT hotelID, hotelName FROM hotels WHERE city='$city'";
                  $hotel_result = $conn->query($hotel_query);
                  while ($row = $hotel_result->fetch_assoc()) {
                      $selected = ($_POST['hotel_id'] ?? '') == $row['hotelID'] ? 'selected' : '';
                      echo "<option value='" . $row['hotelID'] . "' $selected>" . $row['hotelName'] . "</option>";
                  }
                  ?>
               </select>
               <input type="hidden" name="selected_city" value="<?php echo htmlspecialchars($city ?? ''); ?>">
            </div>
         </form>
         <?php } ?>

         <?php if (!empty($_POST['hotel_id'])) { ?>
         <form method="POST" action="">
            <div class="form-group">
               <label for="date">Select Date:</label>
               <input type="date" class="form-control" id="date" name="booking_date" value="<?php echo htmlspecialchars($_POST['booking_date'] ?? ''); ?>" onchange="this.form.submit()">
               <input type="hidden" name="city" value="<?php echo htmlspecialchars($_POST['selected_city'] ?? ''); ?>">
               <input type="hidden" name="hotel_id" value="<?php echo htmlspecialchars($_POST['hotel_id'] ?? ''); ?>">
            </div>
         </form>
         <?php } ?>

         <?php if (!empty($_POST['booking_date'])) { ?>
         <div class="mt-4">
            <h4>Booking Details for Selected Hotel on <?php echo htmlspecialchars($_POST['booking_date']); ?></h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Booking ID</th>
                     <th>Hotel ID</th>
                     <th>Hotel Name</th>
                     <th>Date</th>
                     <th>Username</th>
                     <th>Cancelled</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $hotel_id = $_POST['hotel_id'];
                  $booking_date = date("d-m-Y", strtotime($_POST['booking_date'])); // Convert to DD-MM-YYYY
                  $booking_query = "SELECT b.bookingID, b.hotelID, h.hotelName, b.date, b.username, b.cancelled 
                                    FROM hotelbookings b 
                                    JOIN hotels h ON b.hotelID = h.hotelID 
                                    WHERE b.hotelID = '$hotel_id' AND b.date = '$booking_date'";
                  $booking_result = $conn->query($booking_query);
                  if ($booking_result->num_rows > 0) {
                      while ($row = $booking_result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . $row['bookingID'] . "</td>";
                          echo "<td>" . $row['hotelID'] . "</td>";
                          echo "<td>" . $row['hotelName'] . "</td>";
                          echo "<td>" . $row['date'] . "</td>";
                          echo "<td>" . $row['username'] . "</td>";
                          echo "<td>" . $row['cancelled'] . "</td>";
                          echo "</tr>";
                      }
                  } else {
                      echo "<tr><td colspan='6'>No bookings found for the selected date.</td></tr>";
                  }
                  ?>
               </tbody>
            </table>
         </div>
         <?php } ?>

         <?php $conn->close(); ?>
      </div>
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>

<?php include("footer.html") ?>