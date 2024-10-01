<?php
include "../connection/connect.php";
session_start();

if(!isset($_SESSION['employe_id'])){
    header("location:login_employe.php");
    exit();
}

if (isset($_POST['submit'])) {
    $nom_projet = $_POST['nom_projet'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $employe_id = $_SESSION['employe_id'];

    $projet_photo = $_FILES['projet_photo'];
    $source = $_FILES['projet_photo']['tmp_name'];
    $destination = "../photo_projet/" . $_FILES['projet_photo']['name'];

    move_uploaded_file($source, $destination);
    $query = "INSERT INTO `projets` (`projet_id`, `nom_projet`, `projet_photo`, `prix`, `description`, `employe_id`) 
                  VALUES (null, '$nom_projet', '$destination', '$prix', '$description', '$employe_id')";

    if (mysqli_query($con, $query)) {

        header("location:home.php");
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
    <link rel="stylesheet" href="../css/add_project.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24;
        }
    </style>
</head>

<body>
    <?php include "menu.html" ?>
    <div class="container">
        <div class="item">
            <div class="header">
                <h1> <?= $_SESSION['nom_complete'] ?> مرحبا بك يا </h1>
                <p>
                    قم بإضافة مشاريعك لكي نعرضها في صفحتنا <br> . لمساعدتك في نشر مهاراتك للزبائن و الشركات
                </p>
            </div>
            <div class="main">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="input">
                        <input type="text" name="nom_projet" id="nom_projet" placeholder="إسم المشروع" required>
                        <label class="material-symbols-outlined" for="nom_projet">title</label>
                    </div>

                    <div class="input">
                        <div class="upload_photos">
                            <button type="button" class="upload_photo" onclick="document.getElementById('projet_photo').click()">
                                صورة المشروع
                            </button>
                            <input type="file" name="projet_photo" id="projet_photo" style="display: none;" required>
                            
                        </div>
                        <label class="material-symbols-outlined" for="projet_photo">upload_file</label>
                    </div>

                    <div class="input">
                        <input type="number" name="prix" id="prix" placeholder="الثمن" required>
                        <label class="material-symbols-outlined" for="prix">attach_money</label>
                    </div>

                    <div class="input">
                        <textarea name="description" id="description" placeholder="صف مشروعك" required  style=" width: 60%;"></textarea>
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
                        <a href="logout_employe.php">تسجيل الخروج</a>
                        <a href="profile_employe.php">ملف تعريف</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>