<?php

$id = $_GET['employe_id'];
include "../connection/connect.php";

$query1 = "SELECT nom_complete from employe where employe_id = '$id'";
$result1 = mysqli_query($con, $query1);
$employe = mysqli_fetch_assoc($result1);

$query = "SELECT * from projets where employe_id = '$id'";
$result = mysqli_query($con, $query);
$mess = "";


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/projet_employe.css">

</head>

<body>
    <div class=""><?php include("menu.html") ?></div>
    <div class="container">

        <h1><?= $employe['nom_complete'] ?>   مشاريع  </h1>

        <div class="cards">
            <h1><?php if (mysqli_num_rows($result) == 0) {
                    echo "هذا الشخص ليس لديه مشاريع";
                    echo "<div class='btn'>
                                <a href='view_employe.php?employe_id= " . $id . "'>عــودة</a>
                        </div>";
                    exit();
                } else {
                    $projets = mysqli_fetch_all($result, MYSQLI_ASSOC);
                } ?></h1>

            <?php foreach ($projets as $project): ?>
                <div class="card">
                    <h2><?= $project['nom_projet'] ?></h2>
                    <div class="img"><img src="<?= $project['projet_photo'] ?>" alt="pas"></div>
                    <div class="infos">
                        <div class="info">
                            <p style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"><?= $project['prix'] ?> DH</p>
                            <p>: الثمن</p>
                        </div>
                        <div class="info">
                            <p><?= $project['description'] ?></p>
                            <p>: الوصف</p>
                        </div>
                    </div>
                    <div class="btn2">
                    <a href="valider.html" onclick="return confirm('مل تريد فعلا التقدم لهدا الطلب ؟')">التقدم</a>
                        
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
        <div class="btn3">
            <a href="view_employe.php?employe_id=<?= $id ?>">عــودة</a>
        </div>
    </div>


</body>

</html>