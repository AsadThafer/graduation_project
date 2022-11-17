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
    <link rel="stylesheet" href="css/profile.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>البروفايل الشخصي</title>
</head>

<body>
        <header>
            <nav>
                <a href="index.php">
                    <div class="logo">
                        <img src="img/nav_logo.png" alt="wasselni logo for navbar" width="90px" height="90px" />
                    </div>
                </a>
            </nav>
        </header>
        <main>
            <h2>المعلومات الشخصية</h2>
        <div class="divdesign" id="profile">
        <div class='img_updateinfo'>
				<?php  if (isset($_SESSION['user'])) : ?>
          <img class="profile_image" src="uploads/<?php echo $_SESSION['user']['image_url']; ?>"/>		
          <a class="updateinfo">حذف الصورة</a>	
          </div>
          <br>
		
    
    <form method="post" action="profile.php" >
    <?php echo display_error(); ?>
	<div class="input-group">
		<label >الاسم</label>
		<input dir=rtl type="text" name="displayed_Name" value="<?php echo $_SESSION['user']['displayed_Name']; ?>">
	</div>
	<div class="input-group">
		<label> رقم الموبايل</label>
		<input type="number" name="mobile_Number" value="<?php echo ucfirst($_SESSION['user']['mobile_Number']); ?>">
	</div>
	<div class="input-group">
		<label>البريد الالكتروني</label>
		<input type="email" name="email" value="<?php echo ucfirst($_SESSION['user']['email']); ?>">
	</div>
	<div class="input-group">
		<label>الجنس</label>
		<select name="gender" id="gender" value="<?php echo ucfirst($_SESSION['user']['gender']); ?>">
        <option value="ذكر">ذكر</option>
		<option value="أنثى">أنثى</option>
        </select>
	</div>
    <div class="input-group">
		<input type="hidden" name="id" value="<?php echo ucfirst($_SESSION['user']['id']); ?>"></input>
 </div>
    <button type="submit" class="btn" name="update_btn">تعديل البيانات</button>

 <?php endif ?>
			</div>
		</div>
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