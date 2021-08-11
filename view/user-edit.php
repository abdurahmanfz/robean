<?php

require_once("../database/config.php");
require_once("../auth.php");

$name = '';
$username = '';
$email = '';
$photo = '';
$project = '';
$unit = '';

// if ($_GET['edit'] == true) {
  $id = $_GET['id'];
  $redirect = $_GET['origin'];

  // ambil data project dari database
  $result = mysqli_query($mysqli, "SELECT * FROM users where id = $id");
  while($userdata = mysqli_fetch_array($result))
  {
    $name = $userdata['name'];
    $username = $userdata['username'];
    $email = $userdata['email'];
    $photo = $userdata['photo'];
    $project = $userdata['project'];
    $unit = $userdata['unit'];
  }
  

  if(isset($_POST['update'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $photo = filter_input(INPUT_POST, 'photo', FILTER_SANITIZE_STRING);
    $project = filter_input(INPUT_POST, 'project', FILTER_SANITIZE_STRING);
    $unit = filter_input(INPUT_POST, 'unit', FILTER_SANITIZE_STRING);


    // menyiapkan query
    $sql = "UPDATE `users` SET 
      `name` = :name,
      `username` = :username,
      `email` = :email,
      `photo` = :photo,
      `project` = :project,
      `unit` = :unit
      WHERE `id` = :id";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":email" => $email,
        ":photo" => $photo,
        ":project" => $project,
        ":unit" => $unit,
        ":id" => $id
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka perusahaan sudah terubah
    // maka alihkan ke halaman about
    if($saved) header("Location: ".$redirect.".php");
  }
// }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Data Teknisi | <?php echo $main_title; ?></title>

    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body class="bg-light" style="background-image: url(../img/jumbotron-bg.jpg); background-size: cover;">
    <?php 
        // include("navbar.php");
    ?>
      
    <div class="container" style="margin-top: 150px">
      <div class="row">
        <?php if($_SESSION["user"]["role"] == "adm") {?>
          <div class="col-md-5 col-sm-12">
            <div class="card bg-white p-4">
              <h4>Edit Teknisi</h4>
              
              <form action="" method="POST">
                <div class="form-group">
                  <label for="name">Nama Lengkap</label>
                  <input class="form-control" type="text" value="<?php echo $name;?>" name="name" placeholder="Nama lengkap" autofocus/>
                </div>
  
                <div class="form-group">
                  <label for="username">Username</label>
                  <input class="form-control" type="text" value="<?php echo $username;?>" name="username" placeholder="Username" />
                </div>
  
                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="email" value="<?php echo $email;?>" name="email" placeholder="Alamat Email" />
                </div>
  
                <div class="form-group">
                  <label for="photo">URL Photo</label>
                  <input class="form-control" type="photo" value="<?php echo $photo;?>" name="photo" placeholder="URL Photo" />
                </div>
  
                <div class="form-group">
                  <label for="project">Projek</label>
                  <input class="form-control" type="project" value="<?php echo $project;?>" name="project" placeholder="Projek" />
                </div>
  
                <div class="form-group">
                  <label for="unit">Unit</label>
                  <input class="form-control" type="unit" value="<?php echo $unit;?>" name="unit" placeholder="Unit" />
                </div>
  
                <input type="submit" class="mt-4 btn btn-success btn-block" name="update" value="Edit Teknisi" />
              </form>
            </div>
          </div>
        <?php } else { ?>

          <div class="alert alert-danger" role="alert">
            Akses ditolak!
          </div>
        <?php } ?>
      </div>
    </div>
  </body>
</html>