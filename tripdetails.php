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
$trip_id = $_GET['trip_id'];

if($trip_id == NULL){
    header('location: orders.php');
}
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
    <meta name="description" content="Wasselni Index Page">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="img/wasselni_logo_trans_notext.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرئيسية</title>
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
        $sql = "SELECT * FROM trips INNER JOIN users ON users.id = trips.submitter_id AND trip_id = $trip_id ";
        $result = $conn->query($sql);

        ?>
        <?php echo DisplaySuccess(); ?>


        <?php
            if ($result->num_rows > 0) {

            ?>
        <section id="entry-text" class="card">
            <p>
                تفاصيل الطلب رقم
                <?php echo $trip_id ?>
            </p>
        </section>
        <ul id="Order-list">
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
                    <img id="submitter_image" class="submitter_image" alt="<?php echo $row["displayed_Name"]?> image"
                    src="uploads/<?php echo $row['image_url']; ?>" />
                    <p>من :
                        <?php
                    if ($row["origin"] == "Tulkarm") {
                        echo "طولكرم";
                    } elseif ($row["origin"] == "Ramallah") {
                        echo "رام الله و البيرة";
                    } elseif ($row["origin"] == "Nablus") {
                        echo "نابلس";
                    } elseif ($row["origin"] == "Jericho") {
                        echo "اريحا";
                    } elseif ($row["origin"] == "Hebron") {
                        echo "الخليل";
                    } elseif ($row["origin"] == "Bethlehem") {
                        echo "بيت لحم";
                    } elseif ($row["origin"] == "Jenin") {
                        echo "جنين";
                    } elseif ($row["origin"] == "Qalqilya") {
                        echo "قلقيلية";
                    } elseif ($row["origin"] == "Salfit") {
                        echo "سلفيت";
                    } elseif ($row["origin"] == "Jerusalem") {
                        echo "القدس";
                    } elseif ($row["origin"] == "Tubas") {
                        echo "طوباس";
                    }
                        ?>
                    </p>
                    <p>إلى :
                        <?php
                    if ($row["destination"] == "Tulkarm") {
                        echo "طولكرم";
                    } elseif ($row["destination"] == "Ramallah") {
                        echo "رام الله و البيرة";
                    } elseif ($row["destination"] == "Nablus") {
                        echo "نابلس";
                    } elseif ($row["destination"] == "Jericho") {
                        echo "اريحا";
                    } elseif ($row["destination"] == "Hebron") {
                        echo "الخليل";
                    } elseif ($row["destination"] == "Bethlehem") {
                        echo "بيت لحم";
                    } elseif ($row["destination"] == "Jenin") {
                        echo "جنين";
                    } elseif ($row["destination"] == "Qalqilya") {
                        echo "قلقيلية";
                    } elseif ($row["destination"] == "Salfit") {
                        echo "سلفيت";
                    } elseif ($row["destination"] == "Jerusalem") {
                        echo "القدس";
                    } elseif ($row["destination"] == "Tubas") {
                        echo "طوباس";
                    }
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
                        <?php if ($row["origin_details"] != "") {
                        echo "تفاصيل عنوان الانطلاق : " . $row["origin_details"];
                    } ?>
                    </p>
                    <p>
                        <?php if ($row["destination_details"] != "") {
                        echo "تفاصيل عنوان الوجهة : " . $row["destination_details"];
                    } ?>
                    </p>
                    
                    <p>
                        رقم الموبايل :
                        <?php echo $row["mobile_Number"]; ?>
                    </p>
                    <p>
                        <?php if ($row["extra_details"] != "") {
                        echo "تفاصيل إضافية : " . $row["extra_details"];
                    } ?>
                    </p>
                    <p>
                    <?php if ($row["Vehicle_Model"] != "") { ?>
                        نوع المركبة : 
                        <?php echo $row["Vehicle_Model"]; ?>
                    <?php } ?>
                    </p>
                    
                    <p>
                        <?php echo $row["gender"]; ?>
                    </p>


                </div>
                <div class="Order-element__actions">
                    <?php if ($row["tripStartCoordinatesLat"] != 0 && $row["tripStartCoordinatesLng"] != 0 && $row["destinationtripCoordinatesLat"] != 0 && $row["destinationtripCoordinatesLng"] != 0) { ?>
                <a href="https://www.google.com/maps/dir/?api=1&origin=<?php echo $row["tripStartCoordinatesLat"],",",$row["tripStartCoordinatesLng"] ?>&destination=<?php echo $row["destinationtripCoordinatesLat"],",",$row["destinationtripCoordinatesLng"] ?>&travelmode=driving"
                            target="_blank"> عرض الطريق من مكان الانطلاق الى الوجهة على الخارطة </a>
                <?php } ?>
                <?php if ($row["tripStartCoordinatesLat"] != 0 && $row["tripStartCoordinatesLng"] != 0 && $row["destinationtripCoordinatesLat"] == 0 && $row["destinationtripCoordinatesLng"] == 0) { ?>
                <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $row["tripStartCoordinatesLat"],'%2C',$row["tripStartCoordinatesLng"] ?>"
                            target="_blank"> عرض مكان الانطلاق على الخارطة </a>
                <?php } ?>
                <?php if ($row["tripStartCoordinatesLat"] == 0 && $row["tripStartCoordinatesLng"] == 0 && $row["destinationtripCoordinatesLat"] != 0 && $row["destinationtripCoordinatesLng"] != 0) { ?>
                <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $row["destinationtripCoordinatesLat"],'%2C',$row["destinationtripCoordinatesLng"] ?>"
                            target="_blank"> عرض عنوان الوجهة على الخارطة </a>
                <?php } ?>
                </div>
                
                <div class="Order-element__actions">
                    <a href="tel:<?php echo $row["mobile_Number"]; ?>"> 📞 </a>
                    <?php if ($row['submitter_id'] == $_SESSION['user']['id']) { ?>
                    <a href="FinishTrip.php?trip_id=<?php echo $row["trip_id"] ?>"
                        onclick="return confirm('هل أنت متأكد من إنهاء الطلب؟')"
                        class="btn btn--alt btn--accept finishtripbutton">إنهاء الرحلة</a>
                    <?php } ?>
                    <?php
                if ($row['submitter_id'] != $_SESSION['user']['id']) {
                    if ($row['trip_status'] != 'active') { ?>
                            <a href="JoinTripFun.php?joined_id=<?php echo $_SESSION["user"]["id"] ?>&trip_id=<?php echo $row["trip_id"] ?>"
                        onclick="return confirm('هل أنت متأكد من قبول الطلب؟')"
                        class="btn btn--alt btn--accept accepttrip<?php echo $row["trip_type"]; ?>button"></a>
                        <?php }
                } ?>

                                    <?php if ($row["joined_id"] == $_SESSION["user"]["id"]){ ?>
                                        <a href="LeaveTrip.php?trip_id=<?php echo $row["trip_id"]?>" onclick="return confirm('هل أنت متأكد من رغبتك بمغادرة الطلب؟')"
                                        class="btn btn--alt btn--accept finishtripbutton">مغادرة الرحلة </a>
                                    <?php } ?>

                </div>
                <?php if ($row["joined_id"] != 0) { ?>
                    <div class="Order-element__actions">
                            <p>
                                <?php
                        $sql3 = "SELECT * FROM trips INNER JOIN users ON users.id = trips.joined_id AND (trips.trip_status = 'active' OR trips.trip_status = 'pending') AND (trips.joined_id = '$activeuser' OR trips.submitter_id = '$activeuser') ";
                        $result3 = $conn->query($sql3); ?>
        <?php while ($rowjoined = $result3->fetch_assoc()) { ?>
                            <p> 
                                قام بالانضمام : 
                                <?php echo $rowjoined['displayed_Name']; ?>

                            </p>
                        <?php }
                    } ?>
            </li>

            <?php
                }
            }
            ?>

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