<?php
include "../connection/connect.php";
$passMess = "";
if (isset($_POST['submit'])) {
    extract($_POST);
    $nom_complete = $_POST['nom_complete'];
    $CIN = $_POST['CIN'];
    $date_naissance = $_POST['date_naissance'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $mot_pass = $_POST['mot_pass'];
    $Conf_mot_pass = $_POST['Conf_mot_pass'];
    $genre = $_POST['genre'];


    if ($mot_pass === $Conf_mot_pass) {
        // upload photo
        $source = $_FILES['photo']['tmp_name'];
        $destination = "../photo_user/" . $_FILES['photo']['name'];
        move_uploaded_file($source, $destination);
        // upload photo

        // calc age
        $birthDay = new DateTime($date_naissance);
        $current_date = new DateTime();
        $age = $current_date -> diff($birthDay)->y;
        // calc age

        $query = "INSERT INTO `user`(`user_id`, `nom_complete`, `CIN`, `date_naissance`, `age`, `photo`, `telephone`, `email`, `mot_pass`, `genre`, `date_creation`) 
                    VALUES(null, '$nom_complete', '$CIN', '$date_naissance', '$age', '$destination', '$telephone', '$email', '$mot_pass', '$genre', NOW())";
        mysqli_query($con, $query) or die("error query");
        header("location:login_user.php");
    } else {
        $passMess = "<p style='color:red; font-family: Cairo, sans-serif; text-align:center;'>! كلمات المرور غير متطابقة</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/ins_user.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <?php include("menu.html") ?>
    <div class="container">
        <div class="item">
            <div class="header">
                <span class="material-symbols-outlined">account_circle</span>
            </div>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="input">
                    <input type="text" name="nom_complete" id="name" placeholder="الاسم كاملا" required>
                    <label class="material-symbols-outlined" for="name">title</label>
                </div>

                <div class="input">
                    <input type="text" name="CIN" id="cin" placeholder="CIN" required>
                    <label class="material-symbols-outlined" for="cin">id_card</label>
                </div>

                <div class="input">
                    <input type="date" name="date_naissance" id="date" style="direction: ltr;" required>
                    <label class="material-symbols-outlined" for="date">calendar_month</label>
                </div>

                <div class="input">
                    <div class="upload_photos">
                        <button type="button" class="upload_photo" onclick="document.getElementById('photo').click()">
                            حمل صورتك
                        </button>
                        <input type="file" name="photo" id="photo" style="display: none;" required>
                    </div>
                    <label class="material-symbols-outlined" for="photo">upload_file</label>
                </div>

                <div class="input">
                    <input type="tel" name="telephone" id="tel" placeholder="رقم الهاتف" required>
                    <label class="material-symbols-outlined" for="tel">call</label>
                </div>

                <div class="input">
                    <input type="email" name="email" id="email" placeholder="البريد الالكتروني" required>
                    <label class="material-symbols-outlined" for="email">mail</label>
                </div>

                <div class="input">
                    <input type="password" name="mot_pass" id="pass" placeholder="كلمة السر" required>
                    <label class="material-symbols-outlined" for="pass">lock</label>
                </div>

                <div class="input">
                    <input type="password" name="Conf_mot_pass" id="C_pass" placeholder="تأكيد كلمة السر" required>
                    <label class="material-symbols-outlined" for="C_pass">lock</label>
                </div>

                <div class="genres">
                    <p>: جنسك</p>
                    <div class="genre">
                        <div class="option">
                            <input type="radio" name="genre" value="رجل" id="man" class="check_man" required>
                            <label for="man" class="material-symbols-outlined man">male</label>
                        </div>
                        <div class="option">
                            <input type="radio" name="genre" value="مرأة" id="woman" class="check_woman" required>
                            <label for="woman" class="material-symbols-outlined woman">female</label>
                        </div>
                    </div>
                </div>

                <div id="btn">
                    <input type="submit" value="إنشاء" name="submit">
                </div>
                <?= $passMess ?>
                <hr>
                <p class="foot">
                    لدي حساب مسبقا ! <a href="login_user.php">دخول</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>