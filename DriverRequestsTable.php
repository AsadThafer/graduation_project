<?php
include('functions.php');
if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in as admin first";
  header('location: signin.php');
}

?>
<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Asad Asad">
  <meta name="description" content="Wasselni Driver Requests Table Page">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="img/wasselni_logo_trans_notext.png" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>طلبات الترقية</title>
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

    $sql = "SELECT * FROM users INNER JOIN upgrade_users_requests ON users.id = upgrade_users_requests.user_id AND users.user_status = 'pending'";
    $result = $conn->query($sql);

    ?>
  <?php echo DisplaySuccess(); ?>
  <h2 style="text-align:center ;">قائمة طلبات الترقية - الادمن</h2>

    <div  style=" overflow-x:auto;max-width:90%; margin :20px auto;">
      <table class='userstable'>


        <?php
        if ($result->num_rows > 0) {

        ?>
        <tr class="table__head">
          <th>request_id</td>
          <th>user_id</td>
          <th>displayed_Name</td>
          <th>gender </td>
          <th>license Image</td>
          <th>Vehicle Model</td>
          <th>Request Date</td>
          <th>Reject</td>
          <th>Accept</td>

        </tr>
        <?php
          // output data of each row
          while ($row = $result->fetch_assoc()) {
        ?>


        <tr class="table__tr">
          <td class="table__td">
            <?php echo $row["request_id"]; ?>
          </td>
          <td class="table__td">
            <?php echo $row["id"]; ?>
          </td>
          <td class="table__td">
            <?php echo $row["displayed_Name"]; ?>
          </td>
          <td class="table__td">
            <?php echo $row["gender"]; ?>
          </td>
          <td class="table__td">
            <?php echo $row["license_Image"]; ?>
          </td>
          <td class="table__td">
            <?php echo $row["Vehicle_Model"]; ?>
          </td>
          <td class="table__td">
            <?php echo $row["submission_Date"]; ?>
          </td>
          <td class="table__td"><a onclick="return confirm(' هل أنت متأكد انك تريد رفض الطلب  رقم <?php echo $row['request_id'] ?> ؟')" href="decline_request.php?request_id=<?php echo $row["request_id"] ?>" >Reject</a></td>
          <td class="table__td"><a href="upgrade_accept.php?id=<?php echo $row["id"] ?>&request_id=<?php echo $row["request_id"] ?>">Accept</a></td>
        </tr>



        <?php
          }
        ?>
      </table>
    </div>

    <?php
        } else {
          echo "0 results";
        }


        $conn->close();

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
</script>
</body>

</html>