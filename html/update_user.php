<?php
session_start();
$id = $_SESSION['user_id'];
include "../connection/connect.php";
$mess = "";

$queryForCheck = "SELECT * from user where user_id = '$id'";
$result = mysqli_query($con, $queryForCheck) or die("Error query check");
$user = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    extract($_POST);




    // condition photo
    if (!empty($photo)) {
        $source = $_FILES['photo']['tmp_name'];
        $destination = "../photo_user/" . $_FILES['photo']['name'];
        move_uploaded_file($source, $destination);
    } else {
        $destination = $user['photo'];
    }
    // condition photo

    // condition pass
    if (!empty($mot_pass)) {
        if ($mot_pass === $user['mot_pass']) {
            if (!empty($new_pass)) {
                $query = "UPDATE user set
                nom_complete = '$nom_complete',
                CIN = '$CIN',
                photo = '$destination',
                telephone = '$telephone',
                email = '$email',
                mot_pass = '$new_pass',
                genre = '$genre'
                
                where user_id = $id ";

                mysqli_query($con, $query) or die("ERROR query");
                header("location:profile_user.php");
            } else {
                $new_pass = $user['mot_pass'];

                $query = "UPDATE user set
                nom_complete = '$nom_complete',
                CIN = '$CIN',
                photo = '$destination',
                telephone = '$telephone',
                email = '$email',
                mot_pass = '$new_pass',
                genre = '$genre'
                
                where user_id = $id ";

                mysqli_query($con, $query) or die("ERROR query");
                header("location:profile_user.php");
            }
        } else {
            $mess = "<p style='color:red; font-family: Cairo, sans-serif; text-align:center;'>! كلمة السر غير صحيحة</p>";
        }
    } else {
        $mess = "<p style='color:red; font-family: Cairo, sans-serif; text-align:center;'>يجب كتابة كلمة السر</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/update_employe.css">
</head>

<body>
    <?php include("menu.html") ?>
    <div class="container">
        <div class="item">
            <h1>تعديــل معلومـــاتي</h1>

            <form action="" method="post" enctype="multipart/form-data">

                <div class="infos">
                    <div class="info">
                        <input type="text" value="<?= $user['nom_complete'] ?>" name="nom_complete" placeholder="الإسم الكامل...">
                        <p>: الإسم و النسب</p>
                    </div>

                    <div class="info">
                        <input type="text" value="<?= $user['CIN'] ?>" name="CIN" placeholder="CIN...">
                        <p>: CIN</p>
                    </div>

                    <div class="info">
                        <div class="upload_photos">
                            <button type="button" class="upload_photo" onclick="document.getElementById('photo').click()">
                                غير صورتك
                            </button>
                            <input type="file" name="photo" id="photo" style="display: none;">
                        </div>
                        <p>: صورة</p>
                    </div>

                    <div class="info">
                        <input type="tel" value="<?= $user['telephone'] ?>" name="telephone" placeholder="رقم الهاتف...">
                        <p>: رقم الهاتف</p>
                    </div>

                    <div class="info">
                        <input type="email" value="<?= $user['email'] ?>" name="email" placeholder="البريد الإلكتروني...">
                        <p>: البريد الإلكتروني</p>
                    </div>

        

                    <div class="info">
                        <div class="genre">
                            <div class="option">
                                <input type="radio" name="genre" value="رجل" id="man" class="check_man" <?= $user['genre'] == "رجل" ? 'checked' : '' ?>>
                                <label for="man" class="material-symbols-outlined man">رجل</label>
                            </div>
                            <div class="option">
                                <input type="radio" name="genre" value="مرأة" id="woman" class="check_woman" <?= $user['genre'] == "مرأة" ? 'checked' : '' ?>>
                                <label for="woman" class="material-symbols-outlined woman">مرأة</label>
                            </div>
                        </div>
                        <p>: الجنس</p>
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
                        <a href="profile_user.php">عــودة</a>
                        <input type="submit" name="submit" value="حـفــظ">
                    </div>
                    <?= $mess ?>

                </div>
            </form>

        </div>
    </div>
</body>

</html>