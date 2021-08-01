<?php 
  require_once("../auth.php");
  require_once("../models/admin.php");
  if ($_SESSION["user"]["role"] != "adm") header("Location: ".$base_url."/")
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com"> <!--Anton-->
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <!-- CSS nya -->
    <link rel="stylesheet" type="text/css" href="../style.css">

    <title>Admin | <?php echo $main_title ?></title>
  </head>
  <body>
    <!-- <?php include("../view/navbar.php");?> -->

    <div class="container" style="margin-top: 150px">
      <h3 class="mb-4">Admin Panel</h3>
      <div class="row">
        <div class="col-md-3 col-sm-12">
          <div class="btn-group-vertical btn-group-lg">
            <a type="button" class="btn text-left btn btn-large btn-light" href="<?php echo $base_url . '/view/user.php';?>">Manajemen Karyawan</a>
            <a type="button" class="btn text-left btn btn-large btn-light" href="<?php echo $base_url . '/view/project.php';?>">Manajemen Projek</a>
            <a type="button" class="btn text-left btn btn-large btn-light" href="<?php echo $base_url . '/view/schedule.php';?>">Manajemen Jadwal</a>
            <!-- <a type="button" class="btn text-left btn btn-large btn-light" href="<?php echo $base_url . '/view/galery.php';?>">Manajemen Galery</a> -->
          </div>
          <br>
          <div class="mt-3 btn-group-vertical btn-group-lg">
            <a type="button" class="btn text-left btn btn-large btn-light" href="<?php echo $base_url . '/view/edit-company.php';?>">Ubah Info Perusahaan</a>
          </div>
        </div>

        <div class="col-md-9 col-sm-12">
          <div class="row">
            <!-- Statistik Karyawan -->
            <div class="col-md-4 col-sm-12 p-3">
              <div class="add-card card" style="width: 100%; margin: 10px;">
                <div class="card-body">
                  <h5>Jumlah Karyawan</h5>
                  <h1 class="text-primary mt-3"><?php echo $empl_count;?></h1>
                </div>
                <div class="card-footer bg-transparent text-right"><a href='<?php echo $base_url?>/view/user.php'>Lihat</a>
                </div>
              </div>
            </div>

            <!-- Statistik Projek -->
            <div class="col-md-4 col-sm-12 p-3">
              <div class="add-card card" style="width: 100%; margin: 10px;">
                <div class="card-body">
                  <h5>Jumlah Projek</h5>
                  <h1 class="text-primary mt-3"><?php echo $proj_count; ?></h1>
                </div>
                <div class="card-footer bg-transparent text-right"><a href='<?php echo $base_url?>/view/project.php'>Lihat</a>
                </div>
              </div>
            </div>
            
            <!-- Statistik Jadwal -->
            <div class="col-md-4 col-sm-12 p-3">
              <div class="add-card card" style="width: 100%; margin: 10px;">
                <div class="card-body">
                  <h5>Jumlah Data Jadwal</h5>
                  <h1 class="text-primary mt-3"><?php echo $schd_count;?></h1>
                </div>
                <div class="card-footer bg-transparent text-right"><a href='<?php echo $base_url?>/view/schedule.php'>Lihat</a>
                </div>
              </div>
            </div>
            
            <!-- Statistik Galery -->
            <!-- <div class="col-md-4 col-sm-12 p-3">
              <div class="add-card card" style="width: 100%; margin: 10px;">
                <div class="card-body">
                  <h5>Jumlah Data Galery</h5>
                  <h1 class="text-primary mt-3">0</h1>
                </div>
                <div class="card-footer bg-transparent text-right"><a href='delete.php?id=$project[id]'>Lihat</a>
                </div>
              </div>
            </div> -->
          </div>
        </div>

      </div>
    </div>

    <?php include("../view/footer.php");?>

    <!-- Akhir CONTAINER  -->

    <!-- Akhir Jumbotron -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>

  <style>
    .add-card {
      box-shadow: 0;
      transition: box-shadow .5s;
    } .add-card:hover {
      box-shadow: 0px 0px 4px;
      cursor: pointer;
    }
  </style>
</html>