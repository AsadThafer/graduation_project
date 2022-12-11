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

$id = $_GET["id"];
$request_id = $_GET["request_id"];


// sql to revoke driver


$sql = " UPDATE users SET user_type='user',user_status='rejected',Vehicle_Model = '' WHERE id='$id'";
$sql2 = " UPDATE upgrade_users_requests SET request_status='rejected' WHERE request_id='$request_id'";


if ($conn->query($sql) === TRUE) {
    $conn->query($sql2);
    echo "Record deleted successfully";
    header ('location:DriverRequestsTable.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

