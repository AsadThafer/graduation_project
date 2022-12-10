<?php
include('functions.php');
$servername = "localhost";
$username = "root";
$password = "asad";
$dbname = "wasselni";
$triperrorsmsgs = array();

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


function tripsubmitted()
{
	// call these variables with the global keyword to make them available in function
	global $db, $origin, $destination, $origin_details, $destination_details, $extra_details, $Date_Time, $origintripCoordinatesLat, $origintripCoordinatesLng, $destinationtripCoordinatesLat, $destinationtripCoordinatesLng,$triperrorsmsgs;


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

	if (empty($tripStartCoordinatesLat)) {
		$tripStartCoordinatesLat = 0;
	}
	if (empty($tripStartCoordinatesLng)) {
		$tripStartCoordinatesLng = 0;
	}
	if (empty($destinationtripCoordinatesLat)) {
		$destinationtripCoordinatesLat = 0;
	}
	if (empty($destinationtripCoordinatesLng)) {
		$destinationtripCoordinatesLng = 0;
	}

	if (empty($origin_details)) {
		$origin_details = "";
	}
	if (empty($destination)) {
		$destination = "";
	}
	if (empty($destination_details)) {
		$destination_details = "";
	}
	if (empty($extra_details)) {
		$extra_details = "";
	}
	if (empty($Date_Time)) {
		$Date_Time = "";
	}

	$checkifactive = "SELECT * FROM trips WHERE submitter_id ='$submitter_id' AND trip_status = 'active'";
	$checkifactivequery = mysqli_query($db, $checkifactive);
	$checkifactivequeryresult = mysqli_fetch_assoc($checkifactivequery);

	if ($checkifactivequeryresult) {
		array_push($triperrorsmsgs, "You already have an active trip!!");
		header('location: orders.php');
		return;
	} else {
		$checkifpending = "SELECT * FROM trips WHERE submitter_id = '$submitter_id' AND trip_status = 'pending'";
		$checkifpendingquery = mysqli_query($db, $checkifpending);
		$checkifpendingqueryresult = mysqli_fetch_assoc($checkifpendingquery);

		if ($checkifpendingqueryresult) {
			array_push($triperrorsmsgs, "You already have a pending trip!!");
			header('location: orders.php');
			return;
		} else {
			$tripquery = "INSERT INTO trips(submitter_id,joined_id,tripStartCoordinatesLat,tripStartCoordinatesLng,origin,origin_details,destination,destination_details,extra_details,destinationtripCoordinatesLat,destinationtripCoordinatesLng,Date_Time,trip_type,trip_status)
	VALUES('$submitter_id',0,'$tripStartCoordinatesLat','$tripStartCoordinatesLng','$origin','$origin_details','$destination','$destination_details','$extra_details','$destinationtripCoordinatesLat','$destinationtripCoordinatesLng','$Date_Time','$trip_type','pending')";
			$rule = mysqli_query($db, $tripquery);
			if ($rule) {
				array_push($triperrorsmsgs, "New trip successfully created!!");
				header('location: index.php');
				return;
			} else {
				array_push($triperrorsmsgs, "Something went wrong!!");
				header('location: orders.php');
				return;
			}
		}
	}


}

function displaytrip_error()
{
	global $triperrorsmsgs;

	if (count($triperrorsmsgs) > 0) {
		echo '<div class="error">';
		foreach ($triperrorsmsgs as $triperror) {
			echo $triperror . '<br>';
		}
		echo '</div>';
	}
}

?>