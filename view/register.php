<?php

require_once("../database/config.php");
require_once("../auth.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password) 
            VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: user.php");
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
  <body class="bg-light" style="background-image: url(../img/jumbotron-bg.jpg); background-size: cover;">
    <?php 
        include("navbar.php");
    ?>
      
    <div class="container" style="margin-top: 150px">
      <div class="row">
        <?php if($_SESSION["user"]["role"] == "adm") {?>
          <div class="col-md-5 col-sm-12">
            <div class="card bg-white p-4">
              <h4>Daftarkan Teknisi</h4>
              
              <form action="" method="POST">
                <div class="form-group">
                  <label for="name">Nama Lengkap</label>
                  <input class="form-control" type="text" name="name" placeholder="Nama lengkap" autofocus/>
                </div>
  
                <div class="form-group">
                  <label for="username">Username</label>
                  <input class="form-control" type="text" name="username" placeholder="Username" />
                </div>
  
                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="email" name="email" placeholder="Alamat Email" />
                </div>
  
                <div class="form-group">
                  <label for="password">Password</label>
                  <input class="form-control" type="password" name="password" placeholder="Password" />
                </div>
  
                <input type="submit" class="mt-4 btn btn-success btn-block" name="register" value="Daftarkan Teknisi" />
                <div class="mt-3 text-center">
                  <a href="<?php echo $base_url?>/view/user.php">Lihat Daftar Teknisi</a>
                </div>
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