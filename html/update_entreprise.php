<?php 
session_start();
$id = $_SESSION['entreprise_id'];
include "../connection/connect.php";
$message="";
$queryForCheck = "SELECT * from entreprise where entreprise_id = '$id'";
$result = mysqli_query($con, $queryForCheck) or die("Error query check");
$entreprise = mysqli_fetch_assoc($result);
if (isset($_POST['submit'])) {
    extract($_POST);
    if (!empty($mot_pass)) {
        if ($mot_pass === $entreprise['mot_pass']) {
            if (!empty($new_pass)) {
                $query = "UPDATE entreprise set
                nom_entreprise = '$nom_entreprise',
                adresse = '$adresse',
                numero = '$numero',
                email = '$email',
                mot_pass = '$new_pass',
                entreprise_ty = '$entreprise_ty',
                entreprise_service = '$entreprise_service'
                where entreprise_id = $id ";
                mysqli_query($con, $query) or die("ERROR query");
                header("location:profile_entreprise.php");
            } else {
                $new_pass = $entreprise['mot_pass'];

                $query = "UPDATE entreprise set
                nom_entreprise = '$nom_entreprise',
                adresse = '$adresse',
                numero = '$numero',
                email = '$email',
                mot_pass = '$new_pass',
                entreprise_ty = '$entreprise_ty',
                entreprise_service = '$entreprise_service'
                where entreprise_id = $id ";

                mysqli_query($con, $query) or die("ERROR query");
                header("location:profile_entreprise.php");
            }
        } else {
            $message = "<p style='color:red; font-family: Cairo, sans-serif; text-align:center;'>! كلمة السر غير صحيحة</p>";
        }
    } else {
        $message = "<p style='color:red; font-family: Cairo, sans-serif; text-align:center;'>يجب كتابة كلمة السر</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/update_entreprise.css">
    <style>
       body{display:flex;
        justify-content:center;
        align-items:center;
    } 

    </style>
</head>
<body >
    <?php include "menu.html" ?>
    <div class="container">
        <div class="item">
            <h1>تعديــل معلومـــاتي</h1>

            <form action="" method="post">

                <div class="infos">
                    <div class="info">
                        <input type="text" value="<?= $entreprise['nom_entreprise'] ?>" name="nom_entreprise">
                        <p>:اسم الشركة</p>
                    </div>

                    <div class="info">
                        <input type="text" value="<?= $entreprise['adresse'] ?>" name="adresse" >
                        <p>: العنوان</p>
                    </div>

                    <div class="info">
                        <input type="tel" value="<?= $entreprise['numero'] ?>" name="" >
                        <p>: رقم الهاتف</p>
                    </div>

                    <div class="info">
                        <input type="email" value="<?= $entreprise['email'] ?>" name="email" >
                        <p>: البريد الإلكتروني</p>
                    </div>

                    <div class="info">
                        <select name="entreprise_ty" id="entreprise_ty">
                        <option value="-1" disabled selected>قم باختيار المجال</option>
                                <option value="شركة خاصة" <?= $entreprise['entreprise_ty'] == "شركة خاصة" ? 'selected' : '' ?>>شركة خاصة</option>
                                <option value="شركة عامة" <?= $entreprise['entreprise_ty'] == "شركة عامة" ? 'selected' : '' ?>>شركة عامة</option>
                                <option value="شركة مختلطة" <?= $entreprise['entreprise_ty'] == "شركة مختلطة" ? 'selected' : '' ?>>شركة مختلطة</option>
                                <option value="آخر" <?= $entreprise['entreprise_ty'] == "آخر" ? 'selected' : '' ?>>آخر</option>
                        </select>
                        <p>: قم باختيار المجال</p>
                    </div>
                    <div class="info">
                        <select name="entreprise_service" id="entreprise_service">
                        <option value="-1" disabled selected>قم باختيار نوع الخدمة</option>
                        <option value="شركة تجارية" <?= $entreprise['entreprise_service'] == "شركة تجارية" ? 'selected' : '' ?>>شركة تجارية</option>
                            <option value="شركة صناعية" <?= $entreprise['entreprise_service'] == "شركة صناعية" ? 'selected' : '' ?>>شركة صناعية</option>
                            <option value="شركة خدماتية" <?= $entreprise['entreprise_service'] == "شركة خدماتية" ? 'selected' : '' ?>>شركة خدماتية</option>
                            <option value="آخر" <?= $entreprise['entreprise_service'] == "آخر" ? 'selected' : '' ?>>آخر</option>
                        </select>
                        <p>: قم باختيار نوع الخدمة</p>
                    </div>

                    <div class="info">
                        <input type="password" name="mot_pass" placeholder="كلمة السر القديمة...">
                        <p>: كلمة السر القديمة</p>
                    </div>

                    <div class="info">
                        <input type="password" name="new_pass" placeholder="كلمة السر الجديدة...">
                        <p>: كلمة السر الجديدة</p>
                    </div>

                    <div class="btn">
                        <a href="profile_entreprise.php">عــودة</a>
                        <input type="submit" name="submit" value="حـفــظ">
                    </div>
                    <?= $message ?>

                </div>
            </form>

        </div>
    </div>

<!---->
</body>
</html>