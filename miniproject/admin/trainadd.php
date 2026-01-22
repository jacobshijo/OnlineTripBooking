<?php include("header.html") ?>

<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="tourism";
$trainNo="";
$region="";
$returnTrainNo="";
$trainName="";
$origin="";
$destination="";
$originCode="";
$destinationCode="";
$originTime="";
$destinationTime="";
$originPlatform="";
$destinationPlatform="";
$duration="";
$classes="";
$seats1AC="";
$seats2AC="";
$seats3AC="";
$seatsSL="";
$seatsChairCar="";
$seatsChairCarAC="";
$price1AC="";
$price2AC="";
$price3AC="";
$priceSL="";
$priceChairCar="";
$priceChairCarAC="";
$runsOn="";
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

	$data[1]=$_POST['region'];
	$data[2]=$_POST['returnTrainNo'];
	$data[3]=$_POST['trainName'];
	$data[4]=$_POST['origin'];
    $data[5]=$_POST['destination'];
    $data[6]=$_POST['originCode'];
    $data[7]=$_POST['destinationCode'];
    $data[8]=$_POST['originTime'];
    $data[9]=$_POST['destinationTime'];
	$data[10]=$_POST['originPlatform'];
	$data[11]=$_POST['destinationPlatform'];
	$data[12]=$_POST['duration'];
	$data[13]=$_POST['classes'];
    $data[14]=$_POST['seats1AC'];
    $data[15]=$_POST['seats2AC'];
    $data[16]=$_POST['seats3AC'];
    $data[17]=$_POST['seatsSL'];
    $data[18]=$_POST['seatsChairCar'];
    $data[19]=$_POST['seatsChairCarAC'];
    $data[20]=$_POST['price1AC'];
    $data[21]=$_POST['price2AC'];
    $data[22]=$_POST['price3AC'];
    $data[23]=$_POST['priceSL'];
    $data[24]=$_POST['priceChairCar'];
    $data[25]=$_POST['priceChairCarAC'];
    $data[26]=$_POST['runsOn'];
    $data[27]=$_POST['noOfBookings'];

	return $data;
}

//insert
if(isset($_POST['insert'])){
	$info = getData();
	$insert_query="INSERT INTO `trains`(`region`, `returnTrainNo`, `trainName`, `origin`,`destination`,`originCode`,`destinationCode`,`originTime`,`destinationTime`,`originPlatform`,`destinationPlatform`,`duration`,`classes`,`seats1AC`,`seats2AC`,`seats3AC`,`seatsSL`,`seatsChairCar`,`seatsChairCarAC`,`price1AC`,`price2AC`,`price3AC`,`priceSL`,`priceChairCar`,`priceChairCarAC`,`runsOn`,`noOfBookings`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]','$info[10]','$info[11]','$info[12]','$info[13]','$info[14]','$info[15]','$info[16]','$info[17]','$info[18]','$info[19]','$info[20]','$info[21]','$info[22]','$info[23]','$info[24]','$info[25]','$info[26]','$info[27]')";
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
            <h4>Region</h4>
            <input type="text" name="region" class="form-control" placeholder="Enter Region" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Return Train No.</h4>
            <input type="text" name="returnTrainNO" class="form-control" placeholder="Enter Return Train Number" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Train Name</h4>
            <input type="text" name="trainName" class="form-control" placeholder="Enter Train Name" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Origin</h4>
            <input type="text" name="origin" class="form-control" placeholder="Enter Origin Station" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Destination</h4>
            <input type="text" name="destination" class="form-control" placeholder="Enter Destination Station" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Origin Code</h4>
            <input type="text" name="originCode" class="form-control" placeholder="Enter Origin Station Code" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Destination Code</h4>
            <input type="text" name="destinationCode" class="form-control" placeholder="Enter Destination Station Code" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Origin Time</h4>
            <input type="time" name="originTime" class="form-control" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Destination Time</h4>
            <input type="time" name="destinationTime" class="form-control" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Origin Platform</h4>
            <input type="text" name="originPlatform" class="form-control" placeholder="Enter Origin Platform" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Destination Platform</h4>
            <input type="text" name="destinationPlatform" class="form-control" placeholder="Enter Destination Platform" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Duration</h4>
            <input type="text" name="duration" class="form-control" placeholder="Enter Journey Duration" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Classes</h4>
            <input type="text" name="classes" class="form-control" placeholder="Enter Available Classes" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Seats 1AC</h4>
            <input type="text" name="seats1AC" class="form-control" placeholder="Enter Seats in 1AC" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Seats 2AC</h4>
            <input type="text" name="seats2AC" class="form-control" placeholder="Enter Seats in 2AC" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Seats 3AC</h4>
            <input type="text" name="seats3AC" class="form-control" placeholder="Enter Seats in 3AC" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Seats Sleeper</h4>
            <input type="text" name="seatsSL" class="form-control" placeholder="Enter Seats in Sleeper Class" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Seats Chair Car</h4>
            <input type="text" name="seatsChairCar" class="form-control" placeholder="Enter Seats in Chair Car" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Seats Chair Car AC</h4>
            <input type="text" name="seatsChairCarAC" class="form-control" placeholder="Enter Seats in AC Chair Car" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Price 1AC</h4>
            <input type="text" name="price1AC" class="form-control" placeholder="Enter Price for 1AC" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Price 2AC</h4>
            <input type="text" name="price2AC" class="form-control" placeholder="Enter Price for 2AC" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Price 3AC</h4>
            <input type="text" name="price3AC" class="form-control" placeholder="Enter Price for 3AC" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Price Sleeper</h4>
            <input type="text" name="priceSL" class="form-control" placeholder="Enter Price for Sleeper Class" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Price Chair Car</h4>
            <input type="text" name="priceChairCar" class="form-control" placeholder="Enter Price for Chair Car" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Price Chair Car AC</h4>
            <input type="text" name="priceChairCarAC" class="form-control" placeholder="Enter Price for AC Chair Car" required><br>
        </div>

        <div class="col-xs-6">
            <h4>Runs On</h4>
            <input type="text" name="runsOn" class="form-control" placeholder="Enter Days Train Runs On" required><br>
        </div>

        <div class="col-xs-6">
            <h4>No. Of Bookings</h4>
            <input type="text" name="noOfBookings" class="form-control" placeholder="Enter Number of Bookings" required><br>
        </div>

        <div>
            <input type="submit" class="btn btn-success btn-block btn-lg" name="insert" value="Add Train">
        </div>
        </form>
    </div>
</div>

<?php include("footer.html") ?>