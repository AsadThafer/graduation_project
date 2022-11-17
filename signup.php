<?php include('functions.php');
  if (isLoggedIn()==True) {
    $_SESSION['msg'] = "You Are Logged in Already";
    header('location: index.php');
  }
?>

<!DOCTYPE html>
<html dir="ltr" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Asad Asad">
    <meta name="description" content="Wasselni Sign Up Page">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="img/wasselni_logo_trans_notext.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب</title>
</head>

<body onload="disableSubmit()">
    <header>
        <nav>
            <a href="index.php">
                <div class="logo">
                    <img src="img/nav_logo.png" alt="wasselni logo for navbar" width="90px" height="90px"/>
                    </div>
            </a>
</nav>
        <h1>إنشاء حساب</h1>
    </header>
    <main>
        <section id="signup">
        <?php echo display_error(); ?>
                <form class="signform form-anticlear" id="signupform" action="signup.php" method="post" autocomplete="off">
                    <div class="signupdiv">
                    <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
                        <input type="text" name="username" id="name" placeholder="اسم المستخدم" required>
                        <?php if (isset($name_error)): ?>
	  	                <span><?php echo $name_error; ?></span>
	                    <?php endif ?>
  	                </div>
                    <p>
                        <input dir="rtl" type="text" name="displayed_Name" id="displayed_Name"   placeholder="الاسم بالكامل"
                            required>
                    </p>
                    <p>
                        <input type="email" name="email" id="email" placeholder="البريد الالكتروني"  required>
                    </p>
                    <p>
                         <input type="password" name="password_1" id="password_1" placeholder="كلمة المرور"  required>
                         <i class="bi bi-eye-slash" id="togglePassword"></i>
                    </p>
                    <p>
                         <input type="password" name="password_2" id="password_2" placeholder=" تأكيد كلمة المرور"  required>
                         <i class="bi bi-eye-slash" id="togglePassword2"></i>
                    </p>
                    <p>
                        <input type="tel" name="mobile_Number" id="mobile_Number" placeholder="+970 " value="05"
                            pattern="[0-9]{10}"  required>
                    </p>
                    <p>
                    <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)">  أنا أوافق على الشروط و سياسة الخصوصية
                </p>
                <p>
                    <button class="signsubmit" id="submit" name="register_btn" type="submit">إنشاء حساب</button>
                </p>
            </div>
                </form>
            <p>    لديك حساب بالفعل ؟ <a href="signin.php">تسجيل دخول</a></p>
        
        </section>
    </main>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/akjpro/form-anticlear/base.js"></script>
</body>

</html>