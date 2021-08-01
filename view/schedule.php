<?php
  require("../models/schedule.php");  
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
      <h3 class="text-left mb-4">Jadwal Teknisi Bulan <?php echo $month_name[date("n")-1];?></h3>
      <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Pegawai</th>
              <th scope="col">Minggu</th>
              <th scope="col">Senin</th>
              <th scope="col">Selasa</th>
              <th scope="col">Rabu</th>
              <th scope="col">Kamis</th>
              <th scope="col">Jumat</th>
              <th scope="col">Sabtu</th>
              <th scope="col">Catatan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php while($jadwal = mysqli_fetch_array($result)) { ?>
            <tr>
              <th scope="row"><?php echo $jadwal['id']?></th>
              <td><?php echo $jadwal['name']?></td>
              <td class="p-1">
                <div class="<?php echo $jadwal['minggu'] ? 'bg-success' : 'bg-warning'?>" style="width: 100%; height: 40px"></div>
              </td>
              <td class="p-1">
                <div class="<?php echo $jadwal['senin'] ? 'bg-success' : 'bg-warning'?>" style="width: 100%; height: 40px"></div>
              </td>
              <td class="p-1">
                <div class="<?php echo $jadwal['selasa'] ? 'bg-success' : 'bg-warning'?>" style="width: 100%; height: 40px"></div>
              </td>
              <td class="p-1">
                <div class="<?php echo $jadwal['rabu'] ? 'bg-success' : 'bg-warning'?>" style="width: 100%; height: 40px"></div>
              </td>
              <td class="p-1">
                <div class="<?php echo $jadwal['kamis'] ? 'bg-success' : 'bg-warning'?>" style="width: 100%; height: 40px"></div>
              </td>
              <td class="p-1">
                <div class="<?php echo $jadwal['jumat'] ? 'bg-success' : 'bg-warning'?>" style="width: 100%; height: 40px"></div>
              </td>
              <td class="p-1">
                <div class="<?php echo $jadwal['sabtu'] ? 'bg-success' : 'bg-warning'?>" style="width: 100%; height: 40px"></div>
              </td>
              <td><?php echo $jadwal['note']?></td>
              <td>
                <?php if($_SESSION["user"]["role"] == "adm" ) { ?>
                  <div class="text-right">
                    <a href='<?php echo $base_url;?>/view/schedule/edit.php?id=$employee[id]'>Edit</a> | <a href='delete.php?id=$employee[id]'>Delete</a>
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
      <p>*keterangan</p>
      <div class="alert alert-success" role="alert">
        tanggal hijau adalah jadwal masuk
      </div>
      <div class="alert alert-warning" role="alert">
        tanggal kuning adalah jadwal libur
      </div>
      <!-- <div class="row">
        <?php while($project = mysqli_fetch_array($result)) { ?>
          <div class="card" style="width: 22rem; margin: 10px;">
            <img class="card-img-top" src="<?php echo $project['image']?>" alt="Card image cap" style="width: 100%; height: 220px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title"><?php echo $project['name']?></h5>
              <p class="card-text"><?php echo $project['description']?></p>
              <p class="card-text"><small class="text-muted"><?php echo $project['client_name']?> - <?php echo $project['timestamp']?></small></p>
            </div>
            <?php if($_SESSION["user"]["role"] == "adm" ) { ?>
              <div class="card-footer bg-transparent text-right">
                <a href='edit.php?id=$project[id]'>Edit</a> | <a href='delete.php?id=$project[id]'>Delete</a>
              </div>
            <?php } ?>
          </div>
        <?php } ?>

        <?php if($_SESSION["user"]["role"] == "adm" ) { ?>
          <div class="add-card card" style="width: 22rem; margin: 10px;">
            <div class="mt-5 card-body mx-auto">
              <img class="card-img-top" src="../img/plus.png" alt="add project" style="width: 100%; height: 220px; object-fit: contain; opacity: 0.4">
            </div>
            <div class="card-footer bg-transparent text-right"><a href='delete.php?id=$project[id]'>Tambah</a>
            </div>
          </div>
        <?php } ?>
      </div> -->

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