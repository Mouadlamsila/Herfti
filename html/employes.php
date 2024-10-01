<?php
include "../connection/connect.php";

$query = "SELECT * from employe";
$result = mysqli_query($con, $query) or die("error query");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/view_entreprisee.css">
</head>

<body>
    
    <div class="container">
        <?php include "menu.html" ?>

    
        <h1>الحِرفيين</h1>

        <div class="cards">
        <h1><?php if (mysqli_num_rows($result) == 0) {
                    echo "لا يوجد أي حرفي";
                    
                    exit();
                } else {
                    $employes = mysqli_fetch_all($result, MYSQLI_ASSOC);
                } ?></h1>
            <?php foreach ($employes as $employe): ?>
                <div class="card">
                    <h2><?= $employe['nom_complete'] ?></h2>
                    <div class="img">
                        <img src="<?= $employe['photo'] ?>" alt="<?= $employe['photo'] ?>">
                    </div>

                    <div class="infos">
                        <div class="info">
                            <p><?= $employe['profession'] ?></p>
                            <p>: المهنة</p>
                        </div>
                        <div class="info">
                            <p><?= $employe['telephone'] ?></p>
                            <p>: رقم الهاتف</p>
                        </div>
                    </div>

                    <div class="btn2">
                        <a href="view_employe.php?employe_id=<?= $employe['employe_id'] ?>">عرض الملف الشخصي</a>
                    </div>



                </div>
            <?php endforeach ?>

        </div>
       
    </div>
</body>

</html>