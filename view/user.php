<?php
  require("../models/user.php");  
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

    <title>Jadwal Teknisi | <?php echo $main_title ?></title>
  </head>
  <body>
    <?php include("../view/navbar.php");?>

    <div class="container" style="margin-top: 150px">
      <div class="d-flex">
        <div class="p-2"><h3 class="text-left mb-4">Daftar User Teknisi</h3></div>
        <!-- <div class="p-2">Flex item</div> -->
        <div class="ml-auto p-2">
          <a class='font-weight-bold nav-item bg-primary nav-link mx-2' 
            href="<?php echo $base_url; ?>/view/register.php"
          >Daftarkan Teknisi</a>
        </div>
      </div>
      <div class="text-right">
      </div>
      
      <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Projek/Unit</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php while($jadwal = mysqli_fetch_array($result)) { ?>
            <tr>
              <th scope="row"><?php echo $jadwal['id']?></th>
              <td><?php echo $jadwal['name']?></td>
              <td><?php echo $jadwal['username']?></td>
              <td><?php echo $jadwal['email']?></td>
              <td><?php echo $jadwal['project'] . " / " . $jadwal['unit']?></td>
              <td>
                <?php if($_SESSION["user"]["role"] == "adm" ) { ?>
                  <div class="text-right">
                    <a href='<?php echo $base_url;?>/view/user/edit.php?id=$employee[id]'>Edit</a> | <a href='delete.php?id=$employee[id]'>Delete</a>
                  </div>
                <?php } else {
                  echo "-";
                }?>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
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