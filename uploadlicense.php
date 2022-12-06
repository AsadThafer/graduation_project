<?php
$servername = "localhost";
$username = "root";
$password = "asad";
$dbname = "wasselni";
$id = $_GET['id'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
<?php 
$Vehicle_Model = $_POST['Vehicle_Model'];
$Vehicle_Plate = $_POST['Vehicle_Plate'];
$query = "INSERT INTO upgrade_users_requests (user_id,license_Image,Vehicle_Model,Vehicle_Plate,request_status) 
VALUES ('$id','','$Vehicle_Model','$Vehicle_Plate','Pending')";
$query2 = $sql = " UPDATE users SET user_status='pending' WHERE id='$id'";
$insertquery = mysqli_query($conn, $query);
$updatestatusquery = mysqli_query($conn, $query2);


if (isset($_POST['submit_upgrade_request']) && isset($_FILES['license_Image'])) {
	echo "<pre>";
	print_r($_FILES['license_Image']);
	echo "</pre>";

	$img_name = $_FILES['license_Image']['name'];
	$img_size = $_FILES['license_Image']['size'];
	$tmp_name = $_FILES['license_Image']['tmp_name'];
	$error = $_FILES['license_Image']['error'];

	if ($error === 0) {
		if ($img_size > 12500000) {
		    header("Location: profile.php");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);


              $sql = "UPDATE upgrade_users_requests SET license_Image='$new_img_name' where user_id='$id'";
              mysqli_query($conn, $sql);
                session_start();
				$_SESSION['user']['user_status'] = 'pending';
                echo $new_img_name;
			  	header("Location: profile.php");
			}else {
		        header("Location: profile.php");
			}
		}
	}else {
		header("Location: profile.php");
	}

}else {
	header("Location: profile.php");
}
?>