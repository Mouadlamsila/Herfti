    <?php 
    include "../connection/connect.php";
    $query= "SELECT * from entreprise ";
    $result = mysqli_query($con, $query) or die("Error query");
    $entreprises = mysqli_fetch_all($result , MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/view_entreprisee.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
  <div style=""><?php include "menu.html" ?></div>
  <div class="container">
  <h1>الشركات</h1>
    <div class="cards">
    <?php foreach ($entreprises as $entreprise): ?>
                <div class="card">
                    <div class="infos">
                        <div class="info">
                            <p><?= $entreprise['nom_entreprise'] ?></p>
                            <p>:اسم الشركة</p>
                        </div>
                        <div class="info">
                            <p><?= $entreprise['email'] ?></p>
                            <p>: البريد الالكتروني</p>
                        </div>
                        <div class="info">
                            <p><?= $entreprise['numero'] ?></p>
                            <p>: رقم الهاتف</p>
                        </div>
                    </div>

                    <div class="btn2">
                    <a href="view_entreprise.php?entreprise_id=<?= $entreprise['entreprise_id'] ?>">View More</a>
                    </div>



                </div>
            <?php endforeach ?>

    </div>
  </div>
      
</body>
</html>