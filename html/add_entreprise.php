
<?php  

include "../connection/connect.php";
$fg="";
if(isset($_POST['btn'])){
     extract($_POST);
    if($password != $password_co){
        $fg= "<p style='color:red; font-family: Cairo, sans-serif; text-align:center; margin-top: 1em;'>! كلمات المرور غير متطابقة</p>";
    }else{
        $query = "INSERT into entreprise(entreprise_id, nom_entreprise, adresse, numero, email, mot_pass, entreprise_ty, entreprise_service, date_creation	) value(null,'$nom','$adresse','$numero','$email','$password','$entreprise_ty','$entreprise_service',NOW())";
        mysqli_query($con , $query)or die('erreur');
        header("location:login_entreprise.php");
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/add_entreprise.css">

</head>
<body>
    <?php include "menu.html" ?>
<!--start-->
      <div class="container">
        <h2></h2>
        <form method="post" >
          <div class="form-group" id="m">
            <label for="nom"></label>
            <input type="text" name="nom"  placeholder="اسم الشركة" id="nom">
          </div>
          <div class="form-group">
            <label for="adresse"></label>
            <input type="text" name="adresse"  placeholder="العنوان" id="adresse">
          </div>
          <div class="form-group">
            <label for="numero"></label>
            <input type="tel" name="numero"  placeholder="رقم الهاتف" id="numero">
          </div>
          <div class="form-group">
            <label for="emil"></label>
            <input type="email" name="email" id="email" placeholder="البريد الالكتروني">
          </div>
          <div class="form-group">
            <label for="password1"></label>
            <input type="password" name="password" id="password1" placeholder="كلمة المرور">
          </div>
          <div class="form-group">
            <label for="password2"></label>
            <input type="password" name="password_co" id="password2"  placeholder=" تأكيد كلمة المرور ">
          </div>
          <div class="form-group">
            <label for="ent_service" style="color: white;">مجال عمل الشركة</label>
              <select name="entreprise_service" id="ent_service" >
                <option value="-1">حدد الخيار الأنسب</option>
                <option>شركة تجارية</option>
                <option >شركة صناعية</option>
                <option>شركة خدماتية</option>
                <option>آخر</option>
              </select>
          </div>
          <div class="form-group">
            <label for="ent_ty" style="color: white;">نوع  الشركة</label>
              <select name="entreprise_ty" id="ent_ty">
                <option value="-1">حدد الخيار الأنسب</option>
                <option>شركة خاصة</option>
                <option >شركة عامة</option>
                <option>شركة مختلطة</option>
                <option >آخر</option>
              </select>
          </div>
          <button type="submit" class="btn" name="btn">تسجيل</button>
          <div class="btn-end">
            <input type="reset" value="مسح" class="btn">
            <a href="inscrire_acc.php"><input type="button" value="عودة" class="btn "></a>
          </div>
          
      </div>
<!--end-->
      
      </div>
      <?= $fg ?>
    </form>
</body>
</html>