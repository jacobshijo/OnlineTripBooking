<?php include("header.html") ?>

<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="tourism";
$hotelID="";
$hotelName="";
$city="";
$locality="";
$stars="";
$rating="";
$hotelDesc="";
$checkIn="";
$checkOut="";
$price="";
$roomsAvailable="";
$wifi="";
$swimmingPool="";
$parking="";
$restaurant="";
$laundry="";
$cafe="";
$mainImage="";

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

	$data[1]=$_POST['hotelName'];
	$data[2]=$_POST['city'];
	$data[3]=$_POST['locality'];
	$data[4]=$_POST['stars'];
    $data[5]=$_POST['rating'];
    $data[6]=$_POST['hotelDesc'];
    $data[7]=$_POST['checkIn'];
    $data[8]=$_POST['checkOut'];
    $data[9]=$_POST['price'];
	$data[10]=$_POST['roomsAvailable'];
	$data[11]=$_POST['wifi'];
	$data[12]=$_POST['swimmingPool'];
	$data[13]=$_POST['parking'];
	$data[14]=$_POST['restaurant'];
	$data[15]=$_POST['laundry'];
	$data[16]=$_POST['cafe'];
	$data[17]=$_POST['mainImage'];
	return $data;
}
//insert
if(isset($_POST['insert'])){
	$info = getData();
	$insert_query="INSERT INTO `hotels`(`hotelName`, `city`, `locality`, `stars`,`rating`,`hotelDesc`,`checkIn`,`checkOut`,`price`,`roomsAvailable`,`wifi`,`swimmingPool`,`parking`,`restaurant`,`laundry`,`cafe`,`mainImage`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]','$info[10]','$info[11]','$info[12]','$info[13]','$info[14]','$info[15]','$info[16]','$info[17]')";
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


               <h2 class="text-center my-4">Add Hotels</h2>
<form method="post" action="" enctype="multipart/form-data">  

    <div class="col-xs-6">
        <h4>Hotel Name</h4>
        <input type="text" name="hotelName" class="form-control" placeholder="Enter Hotel Name" required><br>
    </div>
    
    <div class="col-xs-6">
        <h4>City</h4>
        <input type="text" name="city" class="form-control" placeholder="Enter City" required><br>
    </div>
    
    <div class="col-xs-6">
        <h4>Locality</h4>
        <input type="text" name="locality" class="form-control" placeholder="Enter Locality" required><br>
    </div>
    
    <div class="col-xs-6">
        <h4>Stars</h4>
        <div>
            <label><input type="radio" name="stars" value="1" required> 1</label>
            <label><input type="radio" name="stars" value="2"> 2</label>
            <label><input type="radio" name="stars" value="3"> 3</label>
            <label><input type="radio" name="stars" value="4"> 4</label>
            <label><input type="radio" name="stars" value="5"> 5</label>
        </div>
        <br>
    </div>

    <div class="col-xs-6">
        <h4>Rating</h4>
        <input type="text" name="rating" class="form-control" placeholder="Enter Rating" required><br>
    </div>
    
    <div class="col-xs-6">
        <h4>Description</h4>
        <input type="text" name="hotelDesc" class="form-control" placeholder="Enter Description" required><br>
    </div>

    <div class="col-xs-6">
        <h4>Check In</h4>
        <input type="time" name="CheckIn" class="form-control" required><br>
    </div>

    <div class="col-xs-6">
        <h4>Check Out</h4>
        <input type="time" name="CheckOut" class="form-control" required><br>
    </div>

    <div class="col-xs-6">
        <h4>Price</h4>
        <input type="text" name="price" class="form-control" placeholder="Enter Price" required><br>
    </div>

    <div class="col-xs-6">
        <h4>Rooms Available</h4>
        <input type="text" name="roomsAvailable" class="form-control" placeholder="Enter Number of Rooms" required><br>
    </div>

    <div class="col-xs-6">
        <h4>Wifi</h4>
        <label><input type="radio" name="wifi" value="Yes" required> Yes</label>
        <label><input type="radio" name="wifi" value="No"> No</label>
        <br><br>
    </div>

    <div class="col-xs-6">
        <h4>Swimming Pool</h4>
        <label><input type="radio" name="swimmingPool" value="Yes" required> Yes</label>
        <label><input type="radio" name="swimmingPool" value="No"> No</label>
        <br><br>
    </div>

    <div class="col-xs-6">
        <h4>Parking</h4>
        <label><input type="radio" name="parking" value="Yes" required> Yes</label>
        <label><input type="radio" name="parking" value="No"> No</label>
        <br><br>
    </div>

    <div class="col-xs-6">
        <h4>Restaurant</h4>
        <label><input type="radio" name="restaurant" value="Yes" required> Yes</label>
        <label><input type="radio" name="restaurant" value="No"> No</label>
        <br><br>
    </div>

    <div class="col-xs-6">
        <h4>Laundry</h4>
        <label><input type="radio" name="laundry" value="Yes" required> Yes</label>
        <label><input type="radio" name="laundry" value="No"> No</label>
        <br><br>
    </div>

    <div class="col-xs-6">
        <h4>Cafe</h4>
        <label><input type="radio" name="cafe" value="Yes" required> Yes</label>
        <label><input type="radio" name="cafe" value="No"> No</label>
        <br><br>
    </div>

    <div class="col-xs-6">
        <h4>Image</h4>
        <input type="file" name="mainImage" class="form-control" accept="image/*" required><br>
    </div>

    <div>
        <input type="submit" class="btn btn-success btn-block btn-lg" name="insert" value="Add Hotel">
    </div>
</form>

                </div>
                </div>

<?php include("footer.html") ?>