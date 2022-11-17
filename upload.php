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

if (isset($_POST['delete_image'])){
    $sql = "UPDATE users SET image_url = '../images/defaultuser.png' WHERE id = $id";
    $default_img_url = '../images/defaultuser.png';
    $result = mysqli_query($conn, $sql);
    if ($result) {
        session_start();
        $_SESSION['user']['image_url'] = $default_img_url;
        header("Location: profile.php");
        echo "Image deleted successfully";
    } else {
        echo "Error deleting image";
    }

}





if (isset($_POST['updateimage_submit']) && isset($_FILES['my_image'])) {

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

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


              $sql = "UPDATE users SET image_url='$new_img_name' where id='$id'";
              mysqli_query($conn, $sql);
                session_start();
                $_SESSION['user']['image_url'] = $new_img_name;
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