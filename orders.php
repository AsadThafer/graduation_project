<?php include('functions.php');
  if (isLoggedIn()==False) {
    $_SESSION['msg'] = "You Are Logged in Already";
    header('location: signin.php');
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
    <title>الطلبات</title>
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