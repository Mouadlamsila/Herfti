<?php 
include "../connection/connect.php";
$id = $_GET['entreprise_id'];
$qeury = "SELECT * from offre where entreprise_id = '$id'";
$result = mysqli_query($con , $qeury) or die("erreur de requet");
$offres = mysqli_fetch_all($result, MYSQLI_ASSOC); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/view_entreprisee.css">
    <title>Document</title>
    
</head>
<body>
    <?php include "menu.html" ?>

    <div class="container">
  <h1>العروض</h1>
    <div class="cards">
    <h1><?php if (mysqli_num_rows($result) == 0) {
                    echo "هذا الشخص ليس لديه مشاريع \n";
                    echo '<div class=""><a href="entreprises.php"> العودة إلى تجمع الشركات</a> </div>';
                    } ?></h1>
    <?php foreach ($offres as $offre): ?>
                <div class="card">
                    <div class="infos">
                        <div class="info">
                            <p><?= $offre['post'] ?></p>
                            <p>:الوظيفة الشاغرة</p>
                        </div>
                        <div class="info">
                            <p><?= $offre['prix'] ?></p>
                            <p>: الثمن بالرهم</p>
                        </div>
                        <div class="info">
                            <p><?= $offre['skills'] ?></p>
                            <p>:المهارات المطلوبة</p>
                        </div>
                        <div class="info">
                            <p><?= $offre['langue'] ?></p>
                            <p>:اللغة المطلوبة</p>
                        </div>
                        
                        <div class="info">
                            <p><?= $offre['adresse'] ?></p>
                            <p>:مكان الشركة </p>
                        </div>
                        <div class="info">
                            <p><?= $offre['email'] ?></p>
                            <p>: البريد الالكتروني</p>
                        </div>
                        <div class="info">
                            <p><?= $offre['numero'] ?></p>
                            <p>: رقم الهاتف</p>
                        </div>
                        <div class="info">
                            <p><?= $offre['descreption'] ?></p>
                            <p>:وصف</p>
                        </div>
                    </div>
                    <div class="btn2">
                    <!--<a href="ajouter.php?offre_id=<?= $offre['offre_id'] ?>">التقدم </a>-->
                    <a href="entreprises.php" style="margin-right: 50px;">back </a>
                    <a href="valider.html" onclick="return confirm('مل تريد فعلا التقدم لهدا الطلب ؟')">التقدم</a>

                    </div>


                </div>
                

            <?php endforeach ?>

    </div>
  </div>
</body>

</html>