<?php
session_start();
$id = $_SESSION['user_id'];
include "../connection/connect.php";
$query = "SELECT * from user where user_id = '$id'";
$result = mysqli_query($con, $query) or die("ERROR query");
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/profile_employe.css">
</head>

<body>
    <?php include("menu.html") ?>
    <div class="container">
        <div class="item">
            <div class="header">
                <img src="<?= $user['photo'] ?>" alt="<?= $user['photo'] ?>">
            </div>

            <div class="infos">
                <div class="info">
                    <p><?= $user['nom_complete'] ?></p>
                    <p>: الإسم و النسب</p>
                </div>
                <div class="info">
                    <p><?= $user['CIN'] ?></p>
                    <p>: CIN</p>
                </div>
                <div class="info">
                    <p><?= $user['age'] ?></p>
                    <p>: العمر</p>
                </div>
                <div class="info">
                    <p><?= $user['telephone'] ?></p>
                    <p>: رقم الهاتف</p>
                </div>
                <div class="info">
                    <p><?= $user['email'] ?></p>
                    <p>: البريد الإلكتروني</p>
                </div>
                <div class="info">
                    <p><?= $user['genre'] ?></p>
                    <p>: الجنس</p>
                </div>
                <div class="info">
                    <p><?= $user['date_creation'] ?></p>
                    <p>: تاريخ التسجيل</p>
                </div>
            </div>
            <div class="footer">
                <a href="logout_user.php">تسجيل الخروج</a>
                <a href="update_user.php">تعديل</a>
            </div>
            <div class="btn3"><a href="home.php" class="back">عــودة</a></div>
        </div>
    </div>
</body>

</html>