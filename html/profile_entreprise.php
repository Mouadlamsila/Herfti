<?php 
    session_start();
    include "../connection/connect.php";
    $id = $_SESSION['entreprise_id'];
    $query= "SELECT * from entreprise where entreprise_id = '$id'";
    $result = mysqli_query($con, $query) or die("Error query");
    $entreprise = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/profile_entreprise.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <style>
      span{
        margin:10px;
      }
    </style>
</head>
<body>
  <?php include "menu.html" ?>
  <div class="container">
        <div class="item">
            <div class="header">
                <i class="bi bi-buildings-fill" style="font-size: 7rem; color:white;"></i>
            </div>
            
            <div class="infos">
                <div class="info">
                    <p><?= $entreprise['nom_entreprise'] ?></p>
                    <p>:إسم الشركة</p>
                </div>
                <div class="info">
                    <p><?= $entreprise['adresse'] ?></p>
                    <p>: العنوان</p>
                </div>
                <div class="info">
                    <p><?= $entreprise['numero'] ?></p>
                    <p>: رقم الهاتف</p>
                </div>
                <div class="info">
                    <p><?= $entreprise['email'] ?></p>
                    <p>: البريد الإلكتروني</p>
                </div>
                <div class="info">
                    <p>  نوع الشركة :</p>
                    <p><?= $entreprise['entreprise_ty'] ?></p>
                    
                </div>
                <div class="info">
                    <p><?= $entreprise['entreprise_service'] ?></p>
                    <p>مجال الشركة :</p>
                </div>
                <div class="info">
                    <p><?= $entreprise['date_creation'] ?></p>
                    <p>: تاريخ التسجيل</p>
                </div>
              
            </div>
            <div class="footer">
                <a href="add_offre.php" class="back">عــودة</a>
                <a href="update_entreprise.php">تعديل </a>
            </div>
            
        </div>
    </div>
    <!---->
    <!---->
</body>
</html>