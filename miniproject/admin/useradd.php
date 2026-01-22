<?php include("header.html") ?>

<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="tourism";
$UserID="";
$FullName="";
$EMail="";
$Phone="";
$Username="";
$Password="";
$AddressLine1="";
$AddressLine2="";
$City="";
$State="";
$Date="";

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

$data[1]=$_POST['FullName'];
$data[2]=$_POST['EMail'];
$data[3]=$_POST['Phone'];
$data[4]=$_POST['Username'];
$data[5]=$_POST['Password'];
$data[6]=$_POST['AddressLine1'];
$data[7]=$_POST['AddressLine2'];
$data[8]=$_POST['City'];
$data[9]=$_POST['State'];
$data[10]=$_POST['Date'];
	return $data;
}

//insert
if(isset($_POST['insert'])){
	$info = getData();
	$insert_query="INSERT INTO `users`(`FullName`, `EMail`, `Phone`, `Username`,`Password`,`AddressLine1`,`AddressLine2`,`City`,`State`,`Date`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]','$info[10]')";
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


               <h2 class="text-center my-4">Add Users</h2>
               <form method ="post"   action="">  

                   <div class="col-xs-6">
                      <h4>FullName</h4>
                   <input type="text" name="FullName" class="form-control" placeholder="Enter FullName" required><br>
                </div>
                
                <div class="col-xs-6">
                   <h4>Username</h4>
                   <input type="text" name="Username" class="form-control" placeholder="Enter Username" required><br>
                </div>
                
                <div class="col-xs-6">
                <h4>Email</h4>
                   <input type="email" name="EMail" class="form-control" placeholder="Enter Email" required><br>
                </div>
                
                     <div class="col-xs-6">
                   <h4>Phone (10-digit)</h4>
                   <input type="tel" pattern="^\d{10}$" class="form-control" name="Phone"  placeholder="10 digit Phone number"><br>
                </div>
                
                   <div class="col-xs-6">
                      <h4>Password</h1>
                  <input type="password" name="Password" class="form-control" placeholder="Enter password" required><br>
                </div>
                
                <div class="col-xs-6">
                   <h4>Address Line1</h4>
                <input type="text" name="AddressLine1" class="form-control" placeholder="Enter Address Line1" required><br>
                </div>
                
                <div class="col-xs-6">
                   <h4>Address Line2</h4>
                <input type="text" name="AddressLine2" class="form-control" placeholder="Enter Address Line2" required><br>
                </div>
                
                <div class="col-xs-6">
                   <h4>City</h4>
                <input type="text" name="City" class="form-control" placeholder="Enter city" required><br>
                </div>
                
                <div class="col-xs-6">
                   <h4>State</h4>
                <input type="text" name="State" class="form-control" placeholder="Enter State" required><br>
                </div>
                
                <div class="col-xs-6">
                   <h4>Date</h4>
                <input type="date" name="Date" class="form-control" placeholder="Enter date" required><br>
                </div>

                
                   <div>
                      <input type="submit" class="btn btn-success btn-block btn-lg" name="insert" value="Add User">
                   </div>
                </form>
                </div>
                </div>

<?php include("footer.html") ?>