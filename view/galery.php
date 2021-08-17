<?php
  require("../models/galery.php");  
  require_once("../auth.php");
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

    <title>Galeri Teknisi | <?php echo $main_title ?></title>
  </head>
  <body>
    <?php include("../view/navbar.php");?>

    <div class="container" style="margin-top: 150px">
      <h1 class="text-center mb-4">Galery Teknisi</h1>
      <div class="row">
        <?php while($employee = mysqli_fetch_array($result)) { ?>
          <div class="card" style="width: 22rem; margin: 10px;">
            <!-- <img class="card-img-top" src="../img/default.svg" alt="Card image cap" style="width: 100%; height: 220px; object-fit: cover;"> -->
            <img class="card-img-top" src="<?php echo $employee['photo']?>" alt="Card image cap" style="width: 100%; height: 220px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title"><?php echo $employee['name']?></h5>
              <p class="card-text mb-1"><?php echo $employee['email']?></p>
              <p class="card-text"><small class="text-muted"><?php echo $employee['unit'] . " - " . $employee['project']?></small></p>
            </div>
            <?php if($_SESSION["user"]["role"] == "adm" ) { ?>
              <div class="card-footer bg-transparent text-right">
                <a href="<?php echo $base_url . '/view/user-edit.php?id=' . $employee['id'] . '&origin=galery' ;?>">Edit</a> | <a href='delete.php?id=$employee[id]'>Delete</a>
              </div>
            <?php } ?>
          </div>
        <?php } ?>

        <?php if($_SESSION["user"]["role"] == "adm" ) { ?>
          <div class="add-card card" style="width: 22rem; margin: 10px;">
            <div class="mt-5 card-body mx-auto">
              <img class="card-img-top" src="../img/plus.png" alt="add project" style="width: 100%; height: 220px; object-fit: contain; opacity: 0.4">
            </div>
            <div class="card-footer bg-transparent text-right"><a href='<?php echo $base_url?>/view/register.php'>Tambah</a>
            </div>
          </div>
        <?php } ?>
      </div>

      <!-- <table class="table ma-3">
        <tr>
          <th>Nama Projek</th> <th>Deskripsi</th> <th>Client</th> <th>Timestamp</th> <th>Action</th>
        </tr>
        <?php  
          while($project = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$project['name']."</td>";
            echo "<td>".$project['description']."</td>";
            echo "<td>".$project['client_name']."</td>";    
            echo "<td>".$project['timestamp']."</td>";    
            echo "<td><a href='edit.php?id=$project[id]'>Edit</a> | <a href='delete.php?id=$project[id]'>Delete</a></td></tr>";        
          }
        ?>
      </table> -->
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