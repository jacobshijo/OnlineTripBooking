<?php include("header.html") ?>

<div class="container">
    <h2 class="text-center my-4">Name-wise Report on Booking of Trains</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="origin">Select Origin Station:</label>
            <select class="form-control" id="origin" name="origin" onchange="this.form.submit()">
                <option value="">-- Select Origin Station --</option>
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

                // Fetch unique origin stations
                $origin_query = "SELECT DISTINCT origin FROM trains";
                $origin_result = $conn->query($origin_query);
                while ($row = $origin_result->fetch_assoc()) {
                    echo "<option value='" . $row['origin'] . "'>" . $row['origin'] . "</option>";
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
                // Fetch unique destination stations for the selected origin station
                $origin = $_POST['origin'];
                $destination_query = "SELECT DISTINCT destination FROM trains WHERE origin='$origin'";
                $destination_result = $conn->query($destination_query);
                while ($row = $destination_result->fetch_assoc()) {
                    echo "<option value='" . $row['destination'] . "'>" . $row['destination'] . "</option>";
                }
                ?>
            </select>
            <input type="hidden" name="origin" value="<?php echo htmlspecialchars($origin); ?>">
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
                // Fetch train details for the selected origin and destination stations
                $destination = $_POST['destination'];
                $train_query = "SELECT trainNo, trainName FROM trains WHERE origin='$origin' AND destination='$destination'";
                $train_result = $conn->query($train_query);
                while ($row = $train_result->fetch_assoc()) {
                    echo "<option value='" . $row['trainNo'] . "'>" . $row['trainName'] . "</option>";
                }
                ?>
                <input type="hidden" name="origin" value="<?php echo htmlspecialchars($origin); ?>">
                <input type="hidden" name="destination" value="<?php echo htmlspecialchars($destination); ?>">
            </select>
        </div>
    </form>
    <?php } ?>

    <?php if (!empty($_POST['train_id'])) { ?>
    <div class="mt-4">
        <h4>Booking Details for Selected Train</h4>
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
                // Fetch bookings using trainNo
                $train_id = $_POST['train_id'];
                $booking_query = "SELECT b.bookingID, b.trainNo, t.trainName, b.date, b.username, b.cancelled, b.origin, b.destination
                                  FROM trainbookings b 
                                  JOIN trains t ON b.trainNo = t.trainNo 
                                  WHERE b.trainNo = '$train_id'";
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
                    echo "<tr><td colspan='6'>No bookings found.</td></tr>";
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
