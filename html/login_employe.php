<?php
include "../connection/connect.php";
$message = "";
if (isset($_POST['submit'])) {
    extract($_POST);
    $query = "SELECT * from employe
            where email = '$telOrEmail'
            and  mot_pass = '$password'
            or telephone = '$telOrEmail' 
            and mot_pass = '$password'";

    $result = mysqli_query($con, $query) or die("error query");

    if (mysqli_num_rows($result) == 0) {
        $message = "<p style='color:red; font-family: Cairo, sans-serif; text-align:center;'>! الحساب غير موجود</p>";
    } else {
        $employe = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['employe_id'] = $employe['employe_id'];
        $_SESSION['nom_complete'] = $employe['nom_complete'];
        $_SESSION['CIN'] = $employe['CIN'];
        $_SESSION['date_naissance'] = $employe['date_naissance'];
        $_SESSION['age'] = $employe['age'];
        $_SESSION['photo'] = $employe['photo'];
        $_SESSION['telephone'] = $employe['telephone'];
        $_SESSION['email'] = $employe['email'];
        $_SESSION['mot_pass'] = $employe['mot_pass'];
        $_SESSION['profession'] = $employe['profession'];
        $_SESSION['genre'] = $employe['genre'];
        $_SESSION['date_creation'] = $employe['date_creation'];
        header("location:add_project.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<link rel="stylesheet" href="../css/employe_forms.css">-->
    <link rel="stylesheet" href="../css/login_entreprises.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!--<style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24;
        }
        .foot2 {
            width: 100%;
            text-align: center;
            margin-top: 2em;
        }

        .foot2 a {
            text-decoration: none;
            font-family: "Cairo", sans-serif;
            color: blue;
            border: 2px solid blue;

            padding: 0.5em 1em;
            border-radius: 2em;
            font-size: 20px;
            font-weight: 900;
            transition: .2s ease;
            text-align: center;

        }

        .foot2 a:hover {
            color: yellow;
            background: blue;
            border: 2px solid yellow;
        }
    </style>-->
</head>

<body>
<!--start-->
<?php include "../html/menu.html" ?>
<form action="" method="post">
        <div class="login-box">
            <div class="login-header">
            <h1>تسجيل الدخول للحساب</h1>
            <div class="input-box">
            <input type="text" name="telOrEmail" class="input-field" placeholder="... رقم الهاتف أو البريد الالكتروني" required >
            </div>
            <div class="input-box">
            <input type="password"  name="password" class="input-field" placeholder="كلمة المرور " required >
            </div>
            <div class="forgot">
            <section>
                <input type="checkbox" name="remember" id="check" >
                <label for="check">ذكرني رجاء</label>
            </section>
            <section>
                <a href="#">نسيت كلمة السر </a>
            </section>
            </div>
            <div class="input-submit">
            <button class="submit-btn" id="submit" name="submit"></button>
            <label for="submit">تسجيل الدخول</label>
            </div>
            <div class="sign-up-link">
            <p> ليس لدي حساب ! <a href="ins_employe.php">إنشاء</a></p>
            </div>
        </div>

<!--end-->
                <?php


                if (isset($_POST['remember'])) {
                    // Create a cookie to remember the user
                    setcookie('remember_me', 'true', time() + (86400 * 30), "/"); // Cookie expires in 30 days

                }
                ?>
                <?= $message ?>
            
                </form>

</body>

</html>