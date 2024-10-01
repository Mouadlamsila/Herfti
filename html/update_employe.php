<?php
session_start();
$id = $_SESSION['employe_id'];
include "../connection/connect.php";
$mess = "";

$queryForCheck = "SELECT * from employe where employe_id = '$id'";
$result = mysqli_query($con, $queryForCheck) or die("Error query check");
$employe = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    extract($_POST);




    // condition photo
    if (!empty($photo)) {
        $source = $_FILES['photo']['tmp_name'];
        $destination = "../photo_employe/" . $_FILES['photo']['name'];
        move_uploaded_file($source, $destination);
    } else {
        $destination = $employe['photo'];
    }
    // condition photo

    // condition pass
    if (!empty($mot_pass)) {
        if ($mot_pass === $employe['mot_pass']) {
            if (!empty($new_pass)) {
                $query = "UPDATE employe set
                nom_complete = '$nom_complete',
                CIN = '$CIN',
                photo = '$destination',
                telephone = '$telephone',
                email = '$email',
                mot_pass = '$new_pass',
                profession = '$profession',
                genre = '$genre'
                
                where employe_id = $id ";

                mysqli_query($con, $query) or die("ERROR query");
                header("location:profile_employe.php");
            } else {
                $new_pass = $employe['mot_pass'];

                $query = "UPDATE employe set
                nom_complete = '$nom_complete',
                CIN = '$CIN',
                photo = '$destination',
                telephone = '$telephone',
                email = '$email',
                mot_pass = '$new_pass',
                profession = '$profession',
                genre = '$genre'
                
                where employe_id = $id ";

                mysqli_query($con, $query) or die("ERROR query");
                header("location:profile_employe.php");
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
    <?php include "menu.html" ?>
    <div class="container">
        <div class="item">
            <h1>تعديــل معلومـــاتي</h1>

            <form action="" method="post" enctype="multipart/form-data">

                <div class="infos">
                    <div class="info">
                        <input type="text" value="<?= $employe['nom_complete'] ?>" name="nom_complete" placeholder="الإسم الكامل...">
                        <p>: الإسم و النسب</p>
                    </div>

                    <div class="info">
                        <input type="text" value="<?= $employe['CIN'] ?>" name="CIN" placeholder="CIN...">
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
                        <input type="tel" value="<?= $employe['telephone'] ?>" name="telephone" placeholder="رقم الهاتف...">
                        <p>: رقم الهاتف</p>
                    </div>

                    <div class="info">
                        <input type="email" value="<?= $employe['email'] ?>" name="email" placeholder="البريد الإلكتروني...">
                        <p>: البريد الإلكتروني</p>
                    </div>

                    <div class="info">
                        <select name="profession" id="profession">
                            <option value="" disabled selected>قم باختيار مهنتك</option>
                            <option value="نجار" <?= $employe['profession'] == "نجار" ? 'selected' : '' ?>>نجار</option>
                            <option value="حداد" <?= $employe['profession'] == "حداد" ? 'selected' : '' ?>>حداد</option>
                            <option value="خياط" <?= $employe['profession'] == "خياط" ? 'selected' : '' ?>>خياط</option>
                            <option value="ميكانيكي" <?= $employe['profession'] == "ميكانيكي" ? 'selected' : '' ?>>ميكانيكي</option>
                            <option value="بناي" <?= $employe['profession'] == "بناي" ? 'selected' : '' ?>>بناي</option>
                            <option value="صباغ" <?= $employe['profession'] == "صباغ" ? 'selected' : '' ?>>صباغ</option>
                            <option value="سائق شاحنات" <?= $employe['profession'] == "سائق شاحنات" ? 'selected' : '' ?>>سائق شاحنات</option>
                            <option value="عساس" <?= $employe['profession'] == "عساس" ? 'selected' : '' ?>>عساس</option>
                        </select>
                        <p>: المهنة</p>
                    </div>

                    <div class="info">
                        <div class="genre">
                            <div class="option">
                                <input type="radio" name="genre" value="رجل" id="man" class="check_man" <?= $employe['genre'] == "رجل" ? 'checked' : '' ?>>
                                <label for="man" class="material-symbols-outlined man">رجل</label>
                            </div>
                            <div class="option">
                                <input type="radio" name="genre" value="مرأة" id="woman" class="check_woman" <?= $employe['genre'] == "مرأة" ? 'checked' : '' ?>>
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
                        <a href="profile_employe.php">عــودة</a>
                        <input type="submit" name="submit" value="حـفــظ">
                    </div>
                    <?= $mess ?>

                </div>
            </form>

        </div>
    </div>
</body>

</html>