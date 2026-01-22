<?php include("header.html") ?>

<div class="container">
    <h2 class="text-center my-4">Name-wise Report on Booking of Flights</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="origin">Select Origin City:</label>
            <select class="form-control" id="origin" name="origin" onchange="this.form.submit()">
                <option value="">-- Select Origin City --</option>
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

                // Fetch unique origin cities
                $origin_query = "SELECT DISTINCT origin FROM flights";
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
            <label for="destination">Select Destination City:</label>
            <select class="form-control" id="destination" name="destination" onchange="this.form.submit()">
                <option value="">-- Select Destination City --</option>
                <?php
                // Fetch unique destination cities for the selected origin city
                $origin = $_POST['origin'];
                $destination_query = "SELECT DISTINCT destination FROM flights WHERE origin='$origin'";
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
            <label for="flight">Select Flight:</label>
            <select class="form-control" id="flight" name="flight_no" onchange="this.form.submit()">
                <option value="">-- Select Flight --</option>
                <?php
                // Fetch flight details for the selected origin and destination cities
                $destination = $_POST['destination'];
                $flight_query = "SELECT flight_no, operator FROM flights WHERE origin='$origin' AND destination='$destination'";
                $flight_result = $conn->query($flight_query);
                while ($row = $flight_result->fetch_assoc()) {
                    echo "<option value='" . $row['flight_no'] . "'>" . $row['flight_no'] . " " . $row['operator'] . "</option>";
                }
                ?>
            </select>
            <input type="hidden" name="origin" value="<?php echo htmlspecialchars($origin); ?>">
            <input type="hidden" name="destination" value="<?php echo htmlspecialchars($destination); ?>">
        </div>
    </form>
    <?php } ?>

    <?php if (!empty($_POST['flight_no'])) { ?>
    <div class="mt-4">
        <h4>Booking Details for Selected Flight</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Flight ID</th>
                    <th>Flight Name</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Date</th>
                    <th>Username</th>
                    <th>Cancelled</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch bookings using flight_no
                $flight_no = $_POST['flight_no'];
                $booking_query = "SELECT b.bookingID, f.flight_no, f.operator AS flightName, b.date, b.username, b.cancelled, b.origin, b.destination
                                  FROM flightbookings b 
                                  JOIN flights f ON b.flight_no = f.flight_no 
                                  WHERE b.flight_no = '$flight_no'";
                $booking_result = $conn->query($booking_query);
                if ($booking_result->num_rows > 0) {
                    while ($row = $booking_result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['bookingID'] . "</td>";
                        echo "<td>" . $row['flight_no'] . "</td>";
                        echo "<td>" . $row['flightName'] . "</td>";
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
