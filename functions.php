<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', 'asad', 'wasselni');

// variable declaration
$username = "";
$email    = "";
$errors   = array();
$nameerrors= array();

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $password_1, $password_2, $mobile_Number, $displayed_Name;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
    $displayed_Name = e($_POST['displayed_Name']);
	$email       =  e($_POST['email']);
    $password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);
    $mobile_Number = e($_POST['mobile_Number']);

    

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($displayed_Name)) { 
		array_push($errors, "displayed Name is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if (empty($mobile_Number)) { 
		array_push($errors, "Mobile Number is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	
	checkifduplicate();


	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = ($password_1);
		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username,displayed_Name,email,mobile_Number,user_type, password) 
					  VALUES('$username','$displayed_Name','$email','$mobile_Number','$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO users (username,displayed_Name,email,mobile_Number,user_type,password) 
					  VALUES('$username','$displayed_Name','$email','$mobile_Number','user','$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: index.php");
}

// call the login() function if login_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}


// LOGIN USER
function login(){
	global $db, $username,$mobile_Number, $errors;

	// grap form values
	$mobile_Number = e($_POST['mobile_Number']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($mobile_Number)) {
		array_push($errors, "mobile_Number is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = $password;
		$query = "SELECT * FROM users WHERE username='$username' or mobile_Number='$mobile_Number' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
            if($logged_in_user){
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                header('location: index.php');		  
            }
            else {
                array_push($errors, "Wrong username/password combination");
            }
			if ($logged_in_user['user_type'] == 'admin') {
				header('location: home.php');		  
		}
	}
}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin') {
		return true;
	}else{
		return false;
	}
}



$message =array();

function updatemessage() {
	global $message;
	array_push($message, "تم تحديث بياناتك");
}	


if (isset($_POST['update_btn'])) {
	updateprofile();
}

function updateprofile(){
	global $db, $errors,$username,$password ;
    $displayed_Name = val($_POST['displayed_Name']);
    $mobile_Number = val($_POST['mobile_Number']);
    $email=  val($_POST['email']);
    $gender= val($_POST['gender']);
	$id = val($_POST['id']);
	// make sure form is filled properly
	$sql = "UPDATE users SET displayed_Name='$displayed_Name',mobile_Number='$mobile_Number',email='$email',gender='$gender' where id='$id'";
	mysqli_query($db, $sql);
	$_SESSION['user']['displayed_Name'] = $displayed_Name;
	$_SESSION['user']['mobile_Number'] = $mobile_Number;
	$_SESSION['user']['email'] = $email;
	$_SESSION['user']['gender'] = $gender;
	header('location:profile.php'); 
}
function val($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function checkifduplicate(){
	global $db;
	$sql_u = "SELECT * FROM users WHERE username='$username'";
	$sql_e = "SELECT * FROM users WHERE email='$email'";
	$sql_n = "SELECT * FROM users WHERE mobile_Number='$mobile_Number'";
	$res_u = mysqli_query($db, $sql_u);
	$res_e = mysqli_query($db, $sql_e);
	$res_n = mysqli_query($db, $sql_n);
	if (mysqli_num_rows($res_u) > 0) {
		array_push($errors, " هذا الاسم مستخدم من قبل * ");
		 }
	if (mysqli_num_rows($res_e) > 0) {
		array_push($errors, " هذا البريد الالكتروني مستخدم من قبل *");
		 }
	if (mysqli_num_rows($res_n) > 0) {
		array_push($errors, " رقم الموبايل مستخدم من قبل *");
		 }
}




?>
