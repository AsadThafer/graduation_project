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
$Vehicle_Model = $_GET["Vehicle_Model"];
// sql to delete a record
$sql = " UPDATE users SET user_type='Driver',user_status='Upgraded',Vehicle_Model = '$Vehicle_Model' WHERE id='$id'";
$sql2 = " UPDATE upgrade_users_requests SET request_status='Accepted' WHERE request_id='$request_id'";

if ($conn->query($sql) === TRUE) {
    echo "Driver Updated successfully";
    header ('location:DriverRequestsTable.php');
    $conn->query($sql2);

} else {
    echo "Error Updating record: " . $conn->error;
}

$conn->close();
?>