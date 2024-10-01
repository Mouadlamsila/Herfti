<?php  
include "../connection/connect.php";
$message = "";
if(isset($_POST['submit'])){
    extract($_POST);
    $query = "SELECT * from entreprise where email = '$numtel' and mot_pass = '$password' or numero = '$numtel' and mot_pass = '$password' ";
    $result = mysqli_query($con,$query)or die("error de requette");
    if(mysqli_num_rows($result)==0){
        $message = "<p style='color:red; font-family: Cairo, sans-serif; text-align:center;'>! الحساب غير موجود</p>";
    }
    else{
        $entreprise=mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['entreprise_id'] = $entreprise['entreprise_id'];
        $_SESSION['nom_entreprise'] = $entreprise['nom_entreprise'];
        $_SESSION['adresse'] = $entreprise['adresse'];
        $_SESSION['numero'] = $entreprise['numero'];
        $_SESSION['email'] = $entreprise['email'];
        $_SESSION['mot_pass'] = $entreprise['mot_pass'];
        $_SESSION['entreprise_ty'] = $entreprise['entreprise_ty'];
        $_SESSION['entreprise_service'] = $entreprise['entreprise_service'];
        $_SESSION['date_creation'] = $entreprise['date_creation'];
        header("location:add_offre.php");

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login_entreprises.css">
    <!--<link rel="stylesheet" href="../bootstrap/bootstrap.css">-->
</head>
<body>
<?php include "menu.html" ?>
<form method="post" >

<!--start -->
      <div class="login-box">
        <div class="login-header">
          <h1>تسجيل الدخول للحساب</h1>
        <div class="input-box">
          <input type="text" name="numtel" class="input-field" placeholder="... رقم الهاتف أو البريد الالكتروني" required >
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
          <p> ليس لدي حساب ! <a href="add_entreprise.php">إنشاء</a></p>
        </div>
      </div>
<!--end -->

      
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