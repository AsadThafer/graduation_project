<?php include('functions.php');
use function MongoDB\BSON\toJSON;
if (isLoggedIn() == False) {
    $_SESSION['msg'] = "You need to Sign in first";
    header('location: signin.php');
}
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
    <title>سجل طلباتك</title>
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
        <?php

            $activeuser = $_SESSION['user']['id'];
            $sql = "SELECT * FROM trips INNER JOIN users ON users.id = trips.submitter_id AND (trips.trip_status = 'active' OR trips.trip_status = 'expired' or trips.trip_status = 'pending') AND (trips.joined_id = '$activeuser' OR trips.submitter_id = '$activeuser') ORDER BY trips.Date_Time DESC";
            $result = $conn->query($sql);

            ?>
            <?php echo DisplaySuccess(); ?>

            <section id="entry-text" class="card">
            <p> سجل طلباتك </p>
        </section>
        <ul id="Order-list">
            <?php
            if ($result->num_rows > 0) {
                
            ?>
            <?php
                // output data of each row
                while ($row = $result->fetch_assoc()) {
            ?>
        
            <li class="card">
                <div class="Order-element__info">
                    <span class="spantrip<?php echo $row["trip_type"]; ?>"></span>
                    <h2>
                        <?php echo $row["displayed_Name"] ?>
                    </h2>
                    <p>من :
                        <?php 
                        if ($row["origin"] == "Tulkarm"){echo "طولكرم";}
                        elseif ($row["origin"] == "Ramallah"){echo "رام الله و البيرة";}
                        elseif ($row["origin"] == "Nablus"){echo "نابلس";}
                        elseif ($row["origin"] == "Jericho"){echo "اريحا";}
                        elseif ($row["origin"] == "Hebron"){echo "الخليل";}
                        elseif ($row["origin"] == "Bethlehem"){echo "بيت لحم";}
                        elseif ($row["origin"] == "Jenin"){echo "جنين";}
                        elseif ($row["origin"] == "Qalqilya"){echo "قلقيلية";}
                        elseif ($row["origin"] == "Salfit"){echo "سلفيت";}
                        elseif ($row["origin"] == "Jerusalem"){echo "القدس";}
                        elseif ($row["origin"] == "Tubas"){echo "طوباس";}
                        ?>
                    </p>
                    <p>إلى :
                    <?php 
                        if ($row["destination"] == "Tulkarm"){echo "طولكرم";}
                        elseif ($row["destination"] == "Ramallah"){echo "رام الله و البيرة";}
                        elseif ($row["destination"] == "Nablus"){echo "نابلس";}
                        elseif ($row["destination"] == "Jericho"){echo "اريحا";}
                        elseif ($row["destination"] == "Hebron"){echo "الخليل";}
                        elseif ($row["destination"] == "Bethlehem"){echo "بيت لحم";}
                        elseif ($row["destination"] == "Jenin"){echo "جنين";}
                        elseif ($row["destination"] == "Qalqilya"){echo "قلقيلية";}
                        elseif ($row["destination"] == "Salfit"){echo "سلفيت";}
                        elseif ($row["destination"] == "Jerusalem"){echo "القدس";}
                        elseif ($row["destination"] == "Tubas"){echo "طوباس";}
                    ?>
                    </p>
                    <?php
                    $time = $row["Date_Time"];
                    $timestamp = strtotime($time);

                    $child1 = date('n.j.Y', $timestamp); // d.m.YYYY
                    $child2 = date('H:i', $timestamp); // HH:ss
                    ?>
                    <p>التاريخ :
                        <?php echo $child1; ?>
                    </p>
                    <p>الوقت :
                        <?php echo $child2; ?>
                    </p>
                    <p>
                        <?php echo $row["gender"]; ?>
                    </p>

                </div>                   
                    <div class="Order-element__actions">

                    <?php 
                     if ($row["trip_status"] == "active") { ?>
                    <a href="tripdetails.php?trip_id=<?php echo $row["trip_id"]?>" class="btn btn--alt">عرض تفاصيل الطلب</a>
                    <a href="tel:<?php echo $row["mobile_Number"]; ?>"> 📞 </a>
                    <a href="FinishTrip.php?trip_id=<?php echo $row["trip_id"]?>" onclick="return confirm('هل أنت متأكد من إنهاء الطلب؟')"
                        class="btn btn--alt btn--accept finishtripbutton">إنهاء الرحلة</a>
                    <?php } else { ?>

                    <a href="" onclick="return confirm('hi')" class="btn btn--alt">عرض تفاصيل الطلب</a>
                    <a href="tel:<?php echo $row["mobile_Number"]; ?>"> 📞 </a>
                    <?php } ?>
                    </div>
                    <div class="Order-element__status">
                        <p>
                 
                            <?php if ($row["trip_status"] == "active") { ?>
                            <span class="status active">طلب فعال</span>
                            <?php } elseif ($row["trip_status"] == "expired") { ?>
                            <span class="status finished">طلب منتهي</span>
                            <?php } ?>
                        </p>
                    </div>

                    
                    
                 </div>
            </li>
            <?php
    }}
    ?>
    </main>
    
    <footer>
        <nav class="footernav">
            <a href="Profile.php"><img src="img/user_512px.png" alt="profile logo">البروفايل</a>
            <a href="orders.php"><img src="img/order_512px.png" alt="orders logo">الطلبات </a>
            <a href="index.php"><img src="img/home_512px.png" alt="home page logo">الرئيسية</a>
        </nav>
    </footer>
    </body>
    <script src="js/script.js"></script>

                
</html>