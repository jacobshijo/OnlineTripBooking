<?php include("header.html") ?>

<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="tourism";
$flight_no="";
$origin="";
$destination="";
$distance="";
$fare="";
$class="";
$seats_available="";
$departs="";
$arrives="";
$operator="";
$origin_code="";
$destination_code="";
$refundable="";
$noOfBookings="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try{
	$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
	echo("Connection Error");
}
//get data from the form
function getData()
{
	$data = array();

	$data[1]=$_POST['origin'];
	$data[2]=$_POST['destination'];
	$data[3]=$_POST['distance'];
	$data[4]=$_POST['fare'];
  $data[5]=$_POST['class'];
  $data[6]=$_POST['seats_available'];
  $data[7]=$_POST['departs'];
  $data[8]=$_POST['arrives'];
  $data[9]=$_POST['operator'];
	$data[10]=$_POST['origin_code'];
	$data[11]=$_POST['destination_code'];
	$data[12]=$_POST['refundable'];
	$data[13]=$_POST['noOfBookings'];
	return $data;
}

//insert
if(isset($_POST['insert'])){
	$info = getData();
	$insert_query="INSERT INTO `flights`(`origin`, `destination`, `distance`, `fare`,`class`,`seats_available`,`departs`,`arrives`,`operator`,`origin_code`,`destination_code`,`refundable`,`noOfBookings`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]','$info[10]','$info[11]','$info[12]','$info[13]')";
	try{
		$insert_result=mysqli_query($conn, $insert_query);
		if($insert_result)
		{
			if(mysqli_affected_rows($conn)>0){
				echo("Data inserted successfully");

			}else{
				echo("Data not inserted");
			}
		}
	}catch(Exception $ex){
		echo("error inserted".$ex->getMessage());
	}
}

?>


<h2 class="text-center my-4">Add Trains</h2>
    <form method="post" action="" enctype="multipart/form-data">  

            <div class="col-xs-6">
                <h4>Origin</h4>
                <input type="text" name="origin" class="form-control" placeholder="Enter Origin Station" required><br>
            </div>

            <div class="col-xs-6">
                <h4>Destination</h4>
                <input type="text" name="destination" class="form-control" placeholder="Enter Destination Station" required><br>
            </div>

            <div class="col-xs-6">
                <h4>Distance</h4>
                <input type="text" name="distance" class="form-control" placeholder="Enter Distance in Kilometers" required><br>
            </div>

            <div class="col-xs-6">
                <h4>Fare</h4>
                <input type="text" name="fare" class="form-control" placeholder="Enter Fare Amount" required><br>
            </div>

            <div class="col-xs-6">
                <h4>Class</h4>
                <input type="text" name="class" class="form-control" placeholder="Enter Class (e.g., 1AC, 2AC, Sleeper)" required><br>
            </div>

            <div class="col-xs-6">
                <h4>Seats Available</h4>
                <input type="text" name="seats_available" class="form-control" placeholder="Enter Number of Available Seats" required><br>
            </div>

            <div class="col-xs-6">
                <h4>Departs From</h4>
                <input type="text" name="departs" class="form-control" placeholder="Enter Departure Station" required><br>
            </div>

            <div class="col-xs-6">
                <h4>Arrival At</h4>
                <input type="text" name="arrives" class="form-control" placeholder="Enter Arrival Station" required><br>
            </div>

            <div class="col-xs-6">
                <h4>Operator</h4>
                <input type="text" name="operator" class="form-control" placeholder="Enter Train Operator Name" required><br>
            </div>

            <div class="col-xs-6">
                <h4>Origin Code</h4>
                <input type="text" name="origin_code" class="form-control" placeholder="Enter Origin Station Code" required><br>
            </div>

            <div class="col-xs-6">
                <h4>Destination Code</h4>
                <input type="text" name="destination_code" class="form-control" placeholder="Enter Destination Station Code" required><br>
            </div>

            <div class="col-xs-6">
                <h4>Refundable</h4>
                <input type="text" name="refundable" class="form-control" placeholder="Is Fare Refundable? (Yes/No)" required><br>
            </div>

            <div class="col-xs-6">
                <h4>No. Of Bookings</h4>
                <input type="text" name="noOfBookings" class="form-control" placeholder="Enter Number of Bookings" required><br>
            </div>

            <div>
                <input type="submit" class="btn btn-success btn-block btn-lg" name="insert" value="Add Flight">
            </div>
    </form>

    </div>
</div>

<?php include("footer.html") ?>