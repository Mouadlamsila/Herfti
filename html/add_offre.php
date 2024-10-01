<?php 
include "../connection/connect.php";
session_start();

if(!isset($_SESSION['entreprise_id'])){
    header("location:login_entreprise.php");
    exit();
}
if(isset($_POST['submit'])){
    extract($_POST);
    $entreprise_id = $_SESSION['entreprise_id'];
    $query= "INSERT INTO `offre`(`offre_id`,`post`,`adresse`,`langue`,`skills`,`prix`,`descreption`,`numero`,`email`,`entreprise_id`)
     VALUES(NULL,'$post','$adresse','$langue','$skills','$prix','$descreption','$numero','$email','$entreprise_id')";
        if(mysqli_query($con,$query)){
            header("location:profile_entreprise.php");
            exit();
        } else {
            echo "Error" . mysqli_error($con);
        }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/add_offre.css">

</head>
<body >
  <?php include "menu.html" ?>
  <div class="container">
        <div class="item">
            <div class="header">
                <h1> <?= $_SESSION['nom_entreprise'] ?> مرحبا بكم يا </h1>
                <p>
                  يمكنكم الآن تسجيل عرضكم
                </p>
            </div>
            <div class="main">
                <form action="" method="post" >

                    <div class="input">
                        <input type="text" name="post" id="post" placeholder=" الوظيفة الشاغرة" required>
                        <label class="material-symbols-outlined" for="post">title</label>
                    </div>

                    <div class="input">
                        <input type="number" name="prix" id="prix" placeholder="  الثمن بالرهم" required>
                        <label class="material-symbols-outlined" for="prix">attach_money</label>
                    </div>
                    <div class="input">
                        <input type="text" name="adresse" id="adresse" placeholder=" مكان الشركة " required>
                        <label class="material-symbols-outlined" for="adresse">home</label>
                    </div>
                    <div class="input">
                        <input type="tel" name="numero" id="numero" placeholder="رقم الهاتف" required>
                        <label class="material-symbols-outlined" for="numero">phone</label>
                    </div>
                    <div class="input">
                        <input type="email" name="email" id="email" placeholder="البريد الالكتروني" required>
                        <label class="material-symbols-outlined" for="email">email</label>
                    </div>
                    <div class="input">
                        <input type="text" name="skills" id="skills" placeholder="المهارات المطلوبة" required>
                        <label class="material-symbols-outlined" for="skills">home_repair_service</label>
                    </div>
                    <div class="input">
                        <input type="text" name="langue" id="langue" placeholder="اللغة المطلوبة" required>
                        <label class="material-symbols-outlined" for="langue">translate</label>
                    </div>

                    <div class="input">
                        <textarea name="description" id="description" placeholder="....!أكتب هنا" required  style=" width: 60%;"></textarea>
                        <label class="material-symbols-outlined" for="description">description</label>
                    </div>

                    <div id="btn">
                        <input type="submit" value="إضــافة" name="submit">
                    </div>
                    <hr>
                    <div class="foot">
                        <a href="inscrire_acc.php">الصفحة الرئيسية</a>
                    </div>
                    <div class="footer">
                        <a href="logout_entreprise.php">تسجيل الخروج</a>
                        <a href="profile_entreprise.php">ملف تعريف</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
  <!--hohooho-->
    
</body>
</html>