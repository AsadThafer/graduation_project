<?php include('functions.php');
if (isLoggedIn() == False) {
  $_SESSION['msg'] = "You need to Sign in first";
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
  <link rel="stylesheet" href="css/modal.css" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script defer src="js/script.js"></script>
  <script defer src="js/modal2.js"></script>
  <script defer src="js/modal3.js"></script>
 
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

    <div id="backdrop" ></div>
    <div id="backdrop2" ></div>
    <div class="mapmodal" id="map-modal">
      <div class="modal__content">
        <div id="map"></div>
        <p  id="demo"></p>
        <p  id="demo2"></p>
        <button type="button" class="btn mapbtn getmylocation" >تحديد موقعك الحالي</button>
      </div>
      <div class="modal__actions">
        <button class="btn btn--passive">إلغاء</button>
        <button class="btn btn--success success-start">حفظ موقعك</button>
      </div>
    </div>
    <div class="mapmodal" id="Destmap-modal">
      <div class="modal__content">
        <div id="mapDest"></div>
        <p id="demo3"></p>
        <p id="demo4"></p>
        <button type="button" class="btn mapbtn getDestlocation">تحديد وجهتك الحالية</button>
      </div>
      <div class="modal__actions">
        <button class="btn btn--passive actionsbtns cancel-dest">إلغاء</button>
        <button class="btn btn--success actionsbtns success-dest">حفظ وجهتك</button>
      </div>
    </div>

    <h1 class="formtitle">تحتاج توصيلة</h1>
    <form action="https://httpbin.org/post" method="post" class="form-anticlear formtripdetails">
      <div class="divdesign tripformflex">
        <p>
          <label for="tripStartCoordinatesLat"></label>
          <input type="text" name="tripStartCoordinatesLat" id="tripStartCoordinatesLat" value='0' placeholder="x start" />
        </p>
        <p>
          <label for="tripStartCoordinatesLng"></label>
          <input type="text" name="tripStartCoordinatesLng" id="tripStartCoordinatesLng" value='0' placeholder="y start" />
        </p>
        <p>
          <label for="destinationtripCoordinatesLat"></label>
          <input type="text" name="destinationtripCoordinatesLat" id="destinationtripCoordinatesLat" value='0' placeholder="x destination" />
        </p>
        <p>
          <label for="destinationtripCoordinatesLng"></label>
          <input type="text" name="destinationtripCoordinatesLng" id="destinationtripCoordinatesLng" value='0' placeholder="y destination" />
        </p>
        <p>
          <label for="origin">:مكان الانطلاق</label>
          <select name="origin" id="origin">
            <option value="Jenin">جنين</option>
            <option value="Nablus">نابلس</option>
            <option value="Jerusalem">القدس</option>
            <option value="Ramallah">رام الله والبيرة</option>
            <option value="Tubas">طوباس</option>
            <option value="Tulkarm">طولكرم</option>
            <option value="Qalqilya">قلقيلية</option>
            <option value="Salfit">سلفيت</option>
            <option value="Jericho">أريحا</option>
            <option value="Bethlehem">بيت لحم</option>
            <option value="Hebron">الخليل</option>
          </select>
        </p>
        <p>
          <label for="origin_details">:تفاصيل مكان الانطلاق</label>
          <textarea dir="rtl" name="origin_details" id="origin_details" cols="30" rows="2"></textarea>
        </p>
        <p>
          <button type="button" id="add-map-button" class="btn">تحديد موقعك على الخريطة </button>
        </p>
        <p>
          <label for="origin_details">:تفاصيل مكان الانطلاق</label>
          <textarea dir="rtl" name="origin_details" id="origin_details" cols="30" rows="2"></textarea>
        </p>
        <p>
          <label for="destination">:الوجهة</label>
          <select name="destination" id="destination">
            <option value="Jenin">جنين</option>
            <option value="Nablus">نابلس</option>
            <option value="Jerusalem">القدس</option>
            <option value="Ramallah">رام الله والبيرة</option>
            <option value="Tubas">طوباس</option>
            <option value="Tulkarm">طولكرم</option>
            <option value="Qalqilya">قلقيلية</option>
            <option value="Salfit">سلفيت</option>
            <option value="Jericho">أريحا</option>
            <option value="Bethlehem">بيت لحم</option>
            <option value="Hebron">الخليل</option>
          </select>
        </p>
        <p>
          <label for="destination_details">:تفاصيل الوجهة</label>
          <textarea dir="rtl" name="destination_details" id="destination_details" cols="30" rows="2"></textarea>
        </p>
        <p>
          <label for="extra_details">:تفاصيل إضافية</label>
          <textarea dir="rtl" name="extra_details" id="extra_details" cols="30" rows="2"></textarea>

        </p>
        <p>
        <button type="button" id="add-map-destination-button" class="btn">تحديد وجهتك على الخريطة </button>
        </p>
        <p>
          <label for="Date_Time">:موعد الرحلة</label>
          <input type="datetime-local" id="Date_Time" name="Date_Time">
        </p>
        <p>
          <button class="submit tripsubmit" onclick="submitForm()">إرسال الطلب</button>
          <button onclick="formAntiClear.clear()" class="cancelsubmit tripsubmit" type="reset">إلغاء الطلب</button>
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
  <script defer async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCNVumAEwpkaac91aZVxJD6ShIaK8qSSc&callback=initMap&initDestMap&v=weekly"
    ></script>
    <script src="https://cdn.jsdelivr.net/gh/akjpro/form-anticlear/base.js"></script>
</body>

</html>