<?php include('functions.php');
$id = $_SESSION['user']['id'];
  if (isLoggedIn()==False) {
    $_SESSION['msg'] = "You need to Sign in first";
    header('location: signin.php');
  }
  if ($_SESSION['user']['user_type'] != 'user' || $_SESSION['user']['user_status'] != 'rejected') {
    header('location: profile.php');
  }
?>

<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Asad Asad">
  <meta name="description" content="Wasselni Become driver form Page for Normal Users Use Only">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="img/wasselni_logo_trans_notext.png" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> تقديم طلب ترقية </title>
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
    <h1 class="formtitle"> تقديم طلب ترقية</h1>
    <form action="uploadlicense.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
      <div class="divdesign tripformflex">
        <p>
          <label for="Vehicle_Model">:نوع المركبة </label>
          <textarea dir="rtl" name="Vehicle_Model" id="Vehicle_Model" cols="30" rows="2" placeholder="هونداي ايونيك 2021"></textarea>
        </p>
        <p>
          <label for="Vehicle_Plate">:رقم لوحة المركبة </label>
          <input type="text" name="Vehicle_Plate" id="Vehicle_Plate" placeholder="1234-ABCD">
        </p>
        <p>
        <label>إضافة رخصتك </label>
        <div>
        <input type="file" name="license_Image">
        </div>
        </p>
        <button type="submit" class="btn" name="submit_upgrade_request">تقديم الطلب</button>
        </div>
    </form>
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