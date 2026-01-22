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
    <h2 class="text-center my-4">Date-wise Report on Booking of Trains</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="origin">Select Origin Station:</label>
            <select class="form-control" id="origin" name="origin" onchange="this.form.submit()">
                <option value="">-- Select Origin Station --</option>
                <?php
                $origin_query = "SELECT DISTINCT origin FROM trains";
                $origin_result = $conn->query($origin_query);
                while ($row = $origin_result->fetch_assoc()) {
                    $selected = ($_POST['origin'] ?? '') == $row['origin'] ? 'selected' : '';
                    echo "<option value='" . $row['origin'] . "' $selected>" . $row['origin'] . "</option>";
                }
                ?>
            </select>
        </div>
    </form>

    <?php if (!empty($_POST['origin'])) { ?>
    <form method="POST" action="">
        <div class="form-group">
            <label for="destination">Select Destination Station:</label>
            <select class="form-control" id="destination" name="destination" onchange="this.form.submit()">
                <option value="">-- Select Destination Station --</option>
                <?php
                $origin = $_POST['origin'];
                $destination_query = "SELECT DISTINCT destination FROM trains WHERE origin='$origin'";
                $destination_result = $conn->query($destination_query);
                while ($row = $destination_result->fetch_assoc()) {
                    $selected = ($_POST['destination'] ?? '') == $row['destination'] ? 'selected' : '';
                    echo "<option value='" . $row['destination'] . "' $selected>" . $row['destination'] . "</option>";
                }
                ?>
            </select>
            <input type="hidden" name="origin" value="<?php echo htmlspecialchars($origin ?? ''); ?>">
        </div>
    </form>
    <?php } ?>

    <?php if (!empty($_POST['destination'])) { ?>
    <form method="POST" action="">
        <div class="form-group">
            <label for="train">Select Train:</label>
            <select class="form-control" id="train" name="train_id" onchange="this.form.submit()">
                <option value="">-- Select Train --</option>
                <?php
                $destination = $_POST['destination'];
                $train_query = "SELECT trainNo, trainName FROM trains WHERE origin='$origin' AND destination='$destination'";
                $train_result = $conn->query($train_query);
                while ($row = $train_result->fetch_assoc()) {
                    $selected = ($_POST['train_id'] ?? '') == $row['trainNo'] ? 'selected' : '';
                    echo "<option value='" . $row['trainNo'] . "' $selected>" . $row['trainName'] . "</option>";
                }
                ?>
                <input type="hidden" name="origin" value="<?php echo htmlspecialchars($origin ?? ''); ?>">
                <input type="hidden" name="destination" value="<?php echo htmlspecialchars($destination ?? ''); ?>">
            </select>
        </div>
    </form>
    <?php } ?>

    <?php if (!empty($_POST['train_id'])) { ?>
    <form method="POST" action="">
        <div class="form-group">
            <label for="date">Select Date:</label>
            <input type="date" class="form-control" id="date" name="booking_date" value="<?php echo htmlspecialchars($_POST['booking_date'] ?? ''); ?>" onchange="this.form.submit()">
            <input type="hidden" name="origin" value="<?php echo htmlspecialchars($_POST['selected_origin'] ?? ''); ?>">
            <input type="hidden" name="destination" value="<?php echo htmlspecialchars($_POST['selected_destination'] ?? ''); ?>">
            <input type="hidden" name="train_id" value="<?php echo htmlspecialchars($_POST['train_id'] ?? ''); ?>">
        </div>
    </form>
    <?php } ?>

    <?php if (!empty($_POST['booking_date'])) { ?>
    <div class="mt-4">
        <h4>Booking Details for Selected Train on <?php echo htmlspecialchars($_POST['booking_date']); ?></h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Train ID</th>
                    <th>Train Name</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Date</th>
                    <th>Username</th>
                    <th>Cancelled</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $train_id = $_POST['train_id'];
                $booking_date = date("d-m-Y", strtotime($_POST['booking_date'])); // Convert to DD-MM-YYYY
                $booking_query = "SELECT b.bookingID, b.trainNo, t.trainName, b.date, b.username, b.cancelled, b.origin, b.destination 
                                  FROM trainbookings b 
                                  JOIN trains t ON b.trainNo = t.trainNo 
                                  WHERE b.trainNo = '$train_id' AND b.date = '$booking_date'";
                $booking_result = $conn->query($booking_query);
                if ($booking_result->num_rows > 0) {
                    while ($row = $booking_result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['bookingID'] . "</td>";
                        echo "<td>" . $row['trainNo'] . "</td>";
                        echo "<td>" . $row['trainName'] . "</td>";
                        echo "<td>" . $row['origin'] . "</td>";
                        echo "<td>" . $row['destination'] . "</td>";
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
