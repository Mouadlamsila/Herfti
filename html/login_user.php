<?php
include "../connection/connect.php";
$message = "";
if (isset($_POST['submit'])) {
    extract($_POST);
    $query = "SELECT * from user
            where email = '$telOrEmail' 
            and mot_pass = '$password'
            or telephone = '$telOrEmail' 
            and mot_pass = '$password'";

    $result = mysqli_query($con, $query) or die("error query");

    if (mysqli_num_rows($result) == 0) {
        $message = "<p style='color:red; font-family: Cairo, sans-serif; text-align:center;'>! الحساب غير موجود</p>";
    } else {
        $user = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['nom_complete'] = $user['nom_complete'];
        $_SESSION['CIN'] = $user['CIN'];
        $_SESSION['date_naissance'] = $user['date_naissance'];
        $_SESSION['age'] = $user['age'];
        $_SESSION['photo'] = $user['photo'];
        $_SESSION['telephone'] = $user['telephone'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['mot_pass'] = $user['mot_pass'];
        $_SESSION['genre'] = $user['genre'];
        $_SESSION['date_creation'] = $user['date_creation'];
        header("location:profile_user.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login_entreprises.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
</head>

<body>
    <?php include("menu.html") ?>
    <form action="" method="post">
        <!--start -->
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
          <p> ليس لدي حساب ! <a href="ins_user.php">إنشاء</a></p>
        </div>
      </div>
<!--end -->
    </form>
                <?php


                if (isset($_POST['remember'])) {
                    // Create a cookie to remember the user
                    setcookie('remember_me', 'true', time() + (86400 * 30), "/"); // Cookie expires in 30 days

                }
                ?>
                <?= $message ?>
            </form>
        </div>
    </div>
</body>

</html>