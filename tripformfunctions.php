<?php
include('functions.php');
$servername = "localhost";
$username = "root";
$password = "asad";
$dbname = "wasselni";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

?>
<?php
if (isset($_POST['submittrip'])) {
	tripsubmitted();
}

// REGISTER USER
function tripsubmitted()
{
	// call these variables with the global keyword to make them available in function
	global $db , $errors, $origin, $destination, $origin_details, $destination_details, $extra_details, $Date_Time, $origintripCoordinatesLat, $origintripCoordinatesLng, $destinationtripCoordinatesLat, $destinationtripCoordinatesLng; 


	$tripStartCoordinatesLat = e($_POST['tripStartCoordinatesLat']);
	$tripStartCoordinatesLng = e($_POST['tripStartCoordinatesLng']);
	$origin = e($_POST['origin']);
	$origin_details = e($_POST['origin_details']);
	$destination = e($_POST['destination']);
	$destination_details = e($_POST['destination_details']);
	$extra_details = e($_POST['extra_details']);
	$destinationtripCoordinatesLat = e($_POST['destinationtripCoordinatesLat']);
	$destinationtripCoordinatesLng = e($_POST['destinationtripCoordinatesLng']);
	$Date_Time = e($_POST['Date_Time']);
	$submitter_id = $_SESSION['user']['id'];
	$trip_type = e($_POST['trip_type']);

	if (empty($tripStartCoordinatesLat )){
		$tripStartCoordinatesLat = 0;
	}
	if (empty($tripStartCoordinatesLng )){
		$tripStartCoordinatesLng = 0;
	}
	if (empty($destinationtripCoordinatesLat )){
		$destinationtripCoordinatesLat = 0;
	}
	if (empty($destinationtripCoordinatesLng )){
		$destinationtripCoordinatesLng = 0;
	}

	if (empty($origin_details )){
		$origin_details = " ";
	}
	if (empty($destination )){
		$destination = " ";
	}
	if (empty($destination_details )){
		$destination_details = " ";
	}
	if (empty($extra_details )){
		$extra_details = " ";
	}
	if (empty($Date_Time)){
		$Date_Time = " ";
	}

	$tripquery = "INSERT INTO trips(submitter_id,joined_id,tripStartCoordinatesLat,tripStartCoordinatesLng,origin,origin_details,destination,destination_details,extra_details,destinationtripCoordinatesLat,destinationtripCoordinatesLng,Date_Time,trip_type,trip_status)
	VALUES('$submitter_id','','$tripStartCoordinatesLat','$tripStartCoordinatesLng','$origin','$origin_details','$destination','$destination_details','$extra_details','$destinationtripCoordinatesLat','$destinationtripCoordinatesLng','$Date_Time','$trip_type','active')";
	mysqli_query($db, 	$tripquery);
	if($tripquery){
		$_SESSION['success'] = "New trip successfully created!!";
		header('location: index.php');
	}else{
		$_SESSION['error'] = "Something went wrong!!";
		header('location: orders.php');
	}
}




?>