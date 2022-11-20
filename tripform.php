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
  <meta name="description" content="Wasselni trip details form Page">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="img/wasselni_logo_trans_notext.png" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>البحث عن رحلة</title>
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
    <h1 class="formtitle">تحتاج توصيلة</h1>
    <form action="https://httpbin.org/post" method="post">
      <div class="divdesign tripformflex">
        <p>
          <label for="origin">:مكان الانطلاق</label>
          <select name="origin" id="origin">
            <option>القدس</option>
            <option>جنين</option>
            <option>نابلس</option>
            <option>رام الله والبيرة</option>
            <option>طوباس</option>
            <option>طولكرم</option>
            <option>قلقيلية</option>
            <option>سلفيت</option>
            <option>أريحا</option>
            <option>بيت لحم</option>
            <option>الخليل</option>
          </select>
        </p>
        <p>
          <label for="origin_details">:تفاصيل مكان الانطلاق</label>
          <textarea dir="rtl" name="origin_details" id="origin_details" cols="30" rows="2"></textarea>
        </p>
        <p>
          <label for="destination">:الوجهة</label>
          <select name="destination" id="destination">
            <option>القدس</option>
            <option>جنين</option>
            <option>نابلس</option>
            <option>رام الله والبيرة</option>
            <option>طوباس</option>
            <option>طولكرم</option>
            <option>قلقيلية</option>
            <option>سلفيت</option>
            <option>أريحا</option>
            <option>بيت لحم</option>
            <option>الخليل</option>
          </select>
        </p>
        <p>
          <label for="destination_details">:تفاصيل الوجهة</label>
          <textarea dir="rtl" name="destination_details" id="destination_details" cols="30" rows="2"></textarea>
        </p>
        <p>
          <label for="extra_details">:تفاصيل إضافية</label>
          <textarea dir="rtl" name="extra_details" id="extra_details" cols="30" rows="2" ></textarea>
           
        </p>
        <p>
          <label for="Date_Time">:موعد الرحلة</label>
          <input type="datetime-local" id="Date_Time" name="Date_Time">
        </p>
        <p>
          <button class="submit tripsubmit" type="submit">إرسال الطلب</button>
          <button onclick="location.href='index.php'" class="cancelsubmit tripsubmit" type="reset">إلغاء الطلب</button>
        </p>
      </div>
    </form>
    <footer>
      <nav class="footernav">
        <a href="Profile.php"><img src="img/user_512px.png" alt="profile logo">البروفايل</a>
        <a href="orders.php"><img src="img/order_512px.png" alt="orders logo">الطلبات </a>
        <a href="index.php"><img src="img/home_512px.png" alt="home page logo">الرئيسية</a>
      </nav>
  </main>
  </footer>
  <script src="js/script.js"></script>
</body>

</html>