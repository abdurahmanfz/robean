<?php
  require("../models/about.php");
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | <?php echo $main_title ?></title>

    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <?php require_once("navbar.php");?>

    <div class="container" style="margin-top: 150px">
      <h1 class="text-center mb-1">About Us</h1>

      <!-- <a href="" class="btn btn-lg bg-success text-white">Edit this page</a> -->
      <div class="row workingspace mt-5">
        <div class="col--lg-6">
          <img src="../img/workingspace.png" alt="workingspace" class="img-fluid">
        </div>
        <div class="col-lg-5">
          <h3>You <span>Work</span> Like At <span>Home</span></h3>
          <p>Bekerja dengan suasana hati yang lebih asik dan banyak hal baru setiap harinya</p>
        </div>
      </div>

      <div class="container">
        <!-- <img src="../images/tunnel.jpg" class="img-fluid" alt="Responsive image" style="width: 65%; height: 340px; object-fit: cover; border-radius: 10px; box-shadow: 0px 0px 8px;"> -->
        
        <?php while($company = mysqli_fetch_array($result)) { ?>
          <h5 class="mt-5 mb-0"><?php echo $company["name"]; ?></h5>
          <p class="card-text mb-3"><small class="text-muted"><?php echo $company['address']?></small></p>
          <p class=""><?php echo $company["detail"]; ?></p>

          <p>Hubungi kami di <?php echo $company["phone"]; ?></p>
        <?php } ?>
      </div>
      
      <?php require_once("../view/footer.php");?>
    </div>
  </body>
</html>