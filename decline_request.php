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
$sql = "DELETE FROM upgrade_users_requests WHERE request_id='$request_id'";
$sql2 = "UPDATE users SET user_status='rejected' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    $conn->query($sql2);
    echo "Record deleted successfully";
    header ('location:DriverRequestsTable.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>