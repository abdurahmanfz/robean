<?php

require_once("../database/config.php");
require_once("../auth.php");

$name = '';
$description = '';
$image = '';
$client_name = '';

if ($_GET['edit'] == true) {
  $id = $_GET['id'];

  // ambil data project dari database
  $result = mysqli_query($mysqli, "SELECT * FROM projects where id = $id");
  while($projectdata = mysqli_fetch_array($result))
  {
    $name = $projectdata['name'];
    $description = $projectdata['description'];
    $image = $projectdata['image'];
    $client_name = $projectdata['client_name'];
  }
  

  if(isset($_POST['update'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
    $client_name = filter_input(INPUT_POST, 'client_name', FILTER_SANITIZE_STRING);


    // menyiapkan query
    $sql = "UPDATE `projects` SET 
      `name` = :name,
      `description` = :description,
      `image` = :image,
      `client_name` = :client_name 
      WHERE `id` = :id";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":description" => $description,
        ":image" => $image,
        ":client_name" => $client_name,
        ":id" => $id
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka perusahaan sudah terubah
    // maka alihkan ke halaman about
    if($saved) header("Location: project.php");
  }
}

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
    $client_name = filter_input(INPUT_POST, 'client_name', FILTER_SANITIZE_STRING);


    // menyiapkan query
    $sql = "INSERT INTO projects (name, description, image, client_name) 
            VALUES (:name, :description, :image, :client_name)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":description" => $description,
        ":image" => $image,
        ":client_name" => $client_name
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: project.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Masuk | <?php echo $main_title; ?></title>

    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body class="bg-light">
    <?php 
        // include("navbar.php");
    ?>
      
    <div class="container" style="margin-top: 150px">
      <div class="row">
        <?php if($_SESSION["user"]["role"] == "adm") {?>
          <div class="col-md-5 col-sm-12">
            <div class="card bg-white p-4">
              <?php
                if ($_GET['edit']) {
                  echo "<h4>Edit Projek</h4>";
                } else {
                  echo "<h4>Tambah Projek</h4>";
                }
              ?>
              
              <form action="" method="POST">
                <div class="form-group">
                  <label for="name">Nama Projek</label>
                  <input class="form-control" type="text" name="name" placeholder="Nama lengkap" autofocus value="<?php echo $name;?>"/>
                </div>
  
                <div class="form-group">
                  <label for="description">Deskripsi</label>
                  <textarea class="form-control" type="textarea" name="description" placeholder="Detail" value="<?php echo $description;?>"><?php echo $description;?></textarea>
                </div>
  
                <div class="form-group">
                  <label for="image">Link Gambar</label>
                  <input class="form-control" type="text" name="image" placeholder="URL Gambar" value="<?php echo $image;?>"/>
                </div>
  
                <div class="form-group">
                  <label for="client_name">Nama Klien</label>
                  <input class="form-control" type="text" name="client_name" placeholder="Nama Klien" value="<?php echo $client_name;?>"/>
                </div>

                <?php
                  if ($_GET['edit']) {
                    echo "<input type='submit' class='mt-4 btn btn-warning btn-block' name='update' value='Edit Projek' />";
                  } else {
                    echo "<input type='submit' class='mt-4 btn btn-success btn-block' name='register' value='Tambahkan Projek' />";
                  }
                ?>
  
              </form>
            </div>
          </div>
        <?php } else { ?>

          <div class="alert alert-danger" role="alert">
            Akses ditolak!
          </div>
        <?php } ?>
      </div>
      <?php include("../view/footer.php");?>
    </div>
  </body>
</html>