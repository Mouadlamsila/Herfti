<?php 
    include "../connection/connect.php";
    $id = $_GET['employe_id'];
    $query= "SELECT * from employe where employe_id = '$id'";
    $result = mysqli_query($con, $query) or die("Error query check");
    $employe = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/profile_entreprise.css">
</head>
<body>
    <div class=""><?php include("menu.html") ?></div>
    <div class="container">
        <div class="item">
            <div class="header">
                <img src="<?= $employe['photo'] ?>" alt="<?= $employe['photo'] ?>">
            </div>
            
            <div class="infos">
                <div class="info">
                    <p><?= $employe['nom_complete'] ?></p>
                    <p>: الإسم و النسب</p>
                </div>
                <div class="info">
                    <p><?= $employe['CIN'] ?></p>
                    <p>: CIN</p>
                </div>
                <div class="info">
                    <p><?= $employe['age'] ?></p>
                    <p>: العمر</p>
                </div>
                <div class="info">
                    <p><?= $employe['telephone'] ?></p>
                    <p>: رقم الهاتف</p>
                </div>
                <div class="info">
                    <p><?= $employe['email'] ?></p>
                    <p>: البريد الإلكتروني</p>
                </div>
                <div class="info">
                    <p><?= $employe['profession'] ?></p>
                    <p>: المهنة</p>
                </div>
                <div class="info">
                    <p><?= $employe['genre'] ?></p>
                    <p>: الجنس</p>
                </div>
                <div class="info">
                    <p><?= $employe['date_creation'] ?></p>
                    <p>: تاريخ التسجيل</p>
                </div>
            </div>
            <div class="footer">
                <a href="employes.php">عــودة</a>
                <a href="projet_employe.php?employe_id=<?= $employe['employe_id'] ?>">المشاريع </a>
            </div>
            
        </div>
    </div>
</body>
</html>