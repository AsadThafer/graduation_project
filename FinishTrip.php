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

$trip_id = $_GET["trip_id"];

// sql to delete a Finish Trip
$sql = "UPDATE trips Set trip_status='expired' WHERE trip_id='$trip_id' ";
if ($conn->query($sql) === TRUE) {
    echo "Joined Trip successfully";
    header ('location:index.php');
} else {
    echo "Join Failed: " . $conn->error;
}

$conn->close();
?>

