<?php 
	include('functions.php');
    if (isLoggedIn()==False) {
        $_SESSION['msg'] = "You Are Logged in Already";
        header('location: signin.php');
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Asad Asad">
    <meta name="description" content="Wasselni Sign Up Page">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="img/wasselni_logo_trans_notext.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اختر</title>
</head>

<body>
    <div>
        <p>
            <h3>تحتاج لتوصيلة؟</h3>
        </p>
        <a href="pickride.php"> <input type="button" value="املأ بيانات وجهتك الان"></a>

    </div>
    <div>
        <p>
            <h3>تحتاج شريك لرحلتك؟</h3>
        </p>
        <a href="_blanck"> <input type="button" value="املأ بيانات وجهتك الان"></a>
        <p>تحتاج لتوثيق حسابك مسبقا كمالك مركبة*</p>

    </div>

</body>

</html>