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
// sql to delete a record
$sql = " UPDATE users SET user_type='Driver',user_status='Upgraded' WHERE id='$id'";
$sql2 = "DELETE FROM upgrade_users_requests WHERE request_id='$request_id'";

if ($conn->query($sql) === TRUE) {
    echo "Driver Updated successfully";
    header ('location:DriverRequestsTable.php');
    $conn->query($sql2);

} else {
    echo "Error Updating record: " . $conn->error;
}

$conn->close();
?>