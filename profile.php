<?php include('functions.php');
$id = $_SESSION['user']['id'];
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
    <meta name="description" content="Wasselni Sign in Page">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="img/wasselni_logo_trans_notext.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/profile.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>البروفايل الشخصي</title>
</head>

<body onload=toggleFormElements(true)>
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
        <h2 style='text-align:center'>المعلومات الشخصية</h2>
        <div class="divdesign" id="profile">
            <div class='img_updateinfo'>
                <?php if (isset($_SESSION['user'])): ?>
                <img id="myProfileImage" class="profile_image"
                    src="uploads/<?php echo $_SESSION['user']['image_url']; ?>" />
                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="modalclose">&times;</span>
                        <form method="post" action="upload.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                            <div class="input-group">
                                <label>تعديل صورتك </label>
                                <input type="file" name="my_image">
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn" name="updateimage_submit">حفظ التغييرات </button>
                            </div>
                        </form>
                        <form method="post" action="upload.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                            <div class="input-group">
                                <button type="submit" class="btn" name="delete_image">حذف الصورة</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div id='usertypeonprofile'>
                <?php echo $_SESSION['user']['user_type']; ?>
                <br>
                <br>
                <?php if (isAdmin()) {
                        echo "<a <a href='create_user.php'>إضافة مستخدم جديد</a>";
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='UsersList.php'>قائمة المستخدمين</a>";
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='DriverRequestsTable.php'>طلبات الترقية</a>";
                    } ?>
            </div>
            <form id='updateprofileform' class="update_profile_form" method="post" action="profile.php">
                <?php echo display_error(); ?>
                <div class="input-group">
                    <label>الاسم</label>
                    <input dir=rtl type="text" name="displayed_Name"
                        value="<?php echo $_SESSION['user']['displayed_Name']; ?>">
                </div>
                <div class="input-group">
                    <label> رقم الموبايل</label>
                    <input type="tel" name="mobile_Number" pattern="[0-9]{10}"
                        value="<?php echo ucfirst($_SESSION['user']['mobile_Number']); ?>">
                </div>
                <div class="input-group">
                    <label>البريد الالكتروني</label>
                    <input type="email" name="email" value="<?php echo ucfirst($_SESSION['user']['email']); ?>">
                </div>
                <div class="input-group">
                    <label>الجنس</label>
                    <select name="gender" id="gender" value="<?php echo ucfirst($_SESSION['user']['gender']); ?>">
                     <option <?php if ($_SESSION['user']['gender']=='غير محدد')
                        echo "selected"; ?> value="غير محدد">غير محدد</option>
                        <option <?php if ($_SESSION['user']['gender']=='ذكر')
                        echo "selected"; ?> value="ذكر">ذكر</option>
                        <option <?php if ($_SESSION['user']['gender']=='أنثى')
                        echo "selected"; ?> value="أنثى">أنثى
                        </option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="hidden" name="id" value="<?php echo ucfirst($_SESSION['user']['id']); ?>"></input>
                </div>
                <a id='enableedit' onclick='toggleFormElements(false)' class="btn" name="update_btn">تعديل البيانات</a>
                <button class='updatesubmit' id='submitedits' type="submit" class="btn" name="update_btn">حفظ التغييرات </button>
                <a id='canceledits' href='profile.php' class="btn" name="update_btn">إلغاء</a>
                
                <?php endif ?>
        </div>
        </div>
        </div>

        </form>
      <div style="text-align:center ;"><a href="index.php?logout='1'" name='logout'>تسجيل الخروج</a></div>  
    </main>
    <footer>
        <nav class="footernav">
            <a href="Profile.php"><img src="img/user_512px.png" alt="profile logo">البروفايل</a>
            <a href="orders.php"><img src="img/order_512px.png" alt="orders logo">الطلبات </a>
            <a href="index.php"><img src="img/home_512px.png" alt="home page logo">الرئيسية</a>
        </nav>
    </footer>
    <script defer src="js/script.js"></script>
    <script defer src="js/modal.js"></script>
</body>

</html>