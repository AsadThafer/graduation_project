<?php
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

$joined_id = $_GET["joined_id"];
$trip_id = $_GET["trip_id"];

$sqlcheckifontrip = "SELECT * FROM trips WHERE (submitter_id='$joined_id' OR joined_id='$joined_id') AND trip_status='active'";
$result = $conn->query($sqlcheckifontrip);
if ($result->num_rows > 0) {
    echo "You are already on a trip";
    header ('location:index.php');
}


// sql to Join Trip
$sql = "UPDATE trips Set joined_id='$joined_id',trip_status='active' WHERE trip_id='$trip_id' ";
if ($conn->query($sql) === TRUE) {
    echo "Joined Trip successfully";
    header ('location:index.php');
} else {
    echo "Join Failed: " . $conn->error;
}

$conn->close();
?>

