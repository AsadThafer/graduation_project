<?php include('functions.php');
  if (isLoggedIn()==False) {
    $_SESSION['msg'] = "You need to Sign in first";
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
    <link rel="stylesheet" href="css/modal.css" type="text/css">
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

        <section id="entry-text" class="card">
            <p>قائمة - الطلبات</p>
            </section>
            <ul id="Order-list">
            <li class="card">
            <div class="Order-element__info">
            <span>طلب توصيلة</span>
            <h2>أسعد ظافر أسعد</h2>
            <p>من : طولكرم</p>
            <p>إلى : رام الله</p>
            <p>التاريخ : 2021-05-01</p>
            <p>الوقت : 12:00</p>
            <p> ♂️ ذكر</p>

            </div>
            <div class="Order-element__actions">
            <a href="" onclick="return confirm('hi')" class="btn btn--alt">عرض تفاصيل الطلب</a>
            <a href="tel:+00970595681131"> 📞 </a>            
            <a href="" onclick="return confirm('hi')" class="btn btn--alt btn--accept">قبول الطلب</a>         
            </div> 
            </li>



            <?php
            
            // $collection = $db->orders;
            // $cursor = $collection->find();
            // foreach ($cursor as $document) {

                echo '<li class="card">';
                echo '<div class="order-info">';
                echo `<div class="Task-element__info">
                <h2>أسعد</h2>
                <p>فلسطين</p>
                <div class='Task-Options'>
                <button class="btn btn--done">Done ✔️</button>
                <button class="btn btn--delete">Delete 🗑️</button>
                </div>
            </div>`;
            //     echo '<h3>' . $document['order_id'] . '</h3>';
            //     echo '<p>' . $document['order_date'] . '</p>';
            //     echo '<p>' . $document['order_status'] . '</p>';
            //     echo '<p>' . $document['order_price'] . '</p>';
            //     echo '<p>' . $document['order_from'] . '</p>';
            //     echo '<p>' . $document['order_to'] . '</p>';
            //     echo '<p>' . $document['order_user_id'] . '</p>';
            //     echo '<p>' . $document['order_driver_id'] . '</p>';
            //     echo '<p>' . $document['order_car_id'] . '</p>';
            //     echo '</div>';
              echo '</li>';
            // }
            ?>
                
            </ul>



            
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