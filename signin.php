<?php include('functions.php');
if (isLoggedIn() == True) {
    $_SESSION['msg'] = "You Are Logged in Already";
    header('location: index.php');
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
    <title>تسجيل الدخول</title>
</head>

<body>
    <header>
        <header>
            <nav class="topnav">
                <a href="index.php">
                    <div class="logo">
                        <img src="img/nav_logo.png" alt="wasselni logo for navbar" width="90px" height="90px" />
                    </div>
                </a>
            </nav>
            <h1>تسجيل الدخول</h1>
            <p class="note">يرجى الدخول باستخدام بياناتك التي انشأت بها حسابك سابقا </p>
        </header>
        <main>
            <section>
                <form class="signform" id="signinform" action="signin.php" method="post" autocomplete="off">
                    <p> <input type="tel" name="mobile_Number" id="mobile_Number" placeholder="05" pattern="[0-9]{10}"
                            required></p>
                    <p>
                        <input type="password" name="password" id="password_1" placeholder="كلمة المرور" required>
                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                    </p>
                    <p><input name="keep_me_in" type="checkbox">أبقني متصلا</p>
                    <p>
                        <button name="login_btn" class="signsubmit" type="submit">تسجيل الدخول</button>
                    </p>
                </form>
                <p> ليس لديك حساب بعد ؟ <a href="signup.php">إنشاء حساب</a></p>

            </section>
            <?php #echo $_SESSION['user']['displayed_Name']; ?>
        </main>
        <script src="js/script.js"></script>
        <script src="js/signup.js"></script>
</body>

</html>