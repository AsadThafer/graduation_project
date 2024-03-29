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
  <meta name="description" content="Wasselni All Users Table Page for Admin Use Only">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="img/wasselni_logo_trans_notext.png" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>قائمة المستخدمين</title>
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

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    ?>
    <?php echo DisplaySuccess(); ?>
    <h2 style="text-align:center ;">قائمة المستخدمين - الادمن</h2>

    <div style=" overflow-x:auto;max-width:90%; margin :20px auto;">
      <table class='userstable'>


        <?php
        if ($result->num_rows > 0) {

          ?>
          <tr class="table__head">
            <th>ID</td>
            <th>username</td>
            <th>displayed_Name</td>
            <th>Email</td>
            <th>user type</td>
            <th>Password</td>
            <th>Mobile Number</td>
            <th>gender</td>
            <th>Delete</td>
            <th>Update</td>

          </tr>
          <?php
          // output data of each row
          while ($row = $result->fetch_assoc()) {
            ?>


            <tr class="table__tr">
              <td class="table__td">
                <?php echo $row["id"]; ?>
              </td>
              <td class="table__td">
                <?php echo $row["username"]; ?>
              </td>
              <td class="table__td">
                <?php echo $row["displayed_Name"]; ?>
              </td>
              <td class="table__td">
                <?php echo $row["email"]; ?>
              </td>
              <td class="table__td">
                <?php echo $row["user_type"]; ?>
              </td>
              <td class="table__td">
                <?php echo $row["password"]; ?>
              </td>
              <td class="table__td">
                <?php echo $row["mobile_Number"]; ?>
              </td>
              <td class="table__td">
                <?php echo $row["gender"]; ?>
              </td>
              <td class="table__td"> <a
                  onclick="return confirm(' هل أنت متأكد انك تريد حذف المستخدم رقم <?php echo $row['id'] ?> ؟')"
                  href="deluser.php?id=<?php echo $row["id"] ?>">Delete</a></td>
              <td class="table__td"><a href="updateusers.php?id=<?php echo $row["id"] ?>">Update</a></td>
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