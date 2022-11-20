<?php
include('functions.php');
if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in as admin first";
    header('location: signin.php');
}

$servername = "localhost";
$username = "root";
$password = "asad";
$dbname = "wasselni";

$uname = "";
$uemail = "";
$upass = "";
$usser_type = "";
$umobileNumber = "";
$ugender = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Asad Asad">
    <meta name="description" content="Wasselni Sign in Page">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="img/wasselni_logo_trans_notext.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب جديد</title>
</head>

<body>
    <header>
        <nav id="headernav">
            <a href="index.php">
                <div class="logo">
                    <img src="img/nav_logo.png" alt="wasselni logo for navbar" width="90px" height="90px" />
                </div>
            </a>
            <div id="headernavlinks">
                <a href="Profile.php">البروفايل</a>
                <a href="orders.php">الطلبات </a>
                <a href="index.php">الرئيسية</a>
            </div>
        </nav>
    </header>
    <main>
        <div class="header">
		<h2>إنشاء حساب - الادمن</h2>
        </div>
        <div class="divdesign" id='updateusers'>
            <form class="update_profile_form" method="post" action="create_user.php">
                <?php echo display_error(); ?>
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" >
                </div>
                <div class="input-group">
                    <label>Displayed Name</label>
                    <input type="text" name="displayed_Name">
                </div>
                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email">
                </div>
                <div class="input-group">
                    <label>mobile_Number</label>
                    <input type="tel" name="mobile_Number" >
                </div>
                <div class="input-group">
                    <label>User type</label>
                    <select name="user_type" id="user_type">
                        <option value="user">User</option>
                        <option value="Driver">Driver</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="input-group">
                    <label>gender </label>
                    <select name="gender" id="gender">
                        <option value="غير محدد">غير محدد</option>
                        <option value="ذكر">ذكر</option>
                        <option value="أنثى">أنثى</option>
                    </select>
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password_1">
                </div>
                <div class="input-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_2">
                </div>


                <div class="input-group">
                    <button type="submit" class="btn" name="register_btn">إضافة مستخدم</button>
                </div>
                </form>
                    <?php

                    $_SESSION['user']['username'] = $username;
                    $_SESSION['user']['username'] = $email;
                    $_SESSION['user']['username'] = $password;

                    ?>
                </div>
            
        </div>
    </main>
    <footer>
        <nav class="footernav">
            <a href="Profile.php"><img src="img/user_512px.png" alt="profile logo">البروفايل</a>
            <a href="orders.php"><img src="img/order_512px.png" alt="orders logo">الطلبات </a>
            <a href="index.php"><img src="img/home_512px.png" alt="home page logo">الرئيسية</a>

        </nav>


    </footer>
    <script src="js/script.js"></script>
</body>

</html>