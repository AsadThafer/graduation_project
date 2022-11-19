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



$username = val($_POST['username']);
$displayed_Name = val($_POST['displayed_Name']);
$email = val($_POST['email']);
$mobile_Number = val($_POST['mobile_Number']);
$user_type = val($_POST['user_type']);
$gender = val($_POST['gender']);
$password = val($_POST['password']);
$id = val($_POST['id']);

function val($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}




// sql to update a record
$sql = "UPDATE users SET username='$username',displayed_Name='$displayed_Name', email='$email',mobile_Number='$mobile_Number',gender='$gender',user_type='$user_type', password='$password' where id='$id'";

if ($conn->query($sql) === TRUE) {
    array_push($successmsgs, "Updated successfully");
    header('location:UsersList.php'); 
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();