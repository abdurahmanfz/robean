<?php

require_once("../database/config.php");
require_once("../auth.php");
//tampilkan data perusahaan
$name = "";
$address = "";
$phone = "";
$detail = "";
 // ambil data company dari database
$result = mysqli_query($mysqli, "SELECT * FROM company where id = '1'");
while($companydata = mysqli_fetch_array($result))
{
  $name = $companydata['name'];
	$address = $companydata['address'];
	$phone = $companydata['phone'];
	$detail = $companydata['detail'];
}

if(isset($_POST['updateCompany'])) {
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
  $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
  $detail = filter_input(INPUT_POST, 'detail', FILTER_SANITIZE_STRING);


  // menyiapkan query
  $sql = "UPDATE `company` SET 
    `name` = :name,
    `address` = :address,
    `phone` = :phone,
    `detail` = :detail 
    WHERE `id` = '1'";
  $stmt = $db->prepare($sql);

  // bind parameter ke query
  $params = array(
      ":name" => $name,
      ":address" => $address,
      ":phone" => $phone,
      ":detail" => $detail
  );

  // eksekusi query untuk menyimpan ke database
  $saved = $stmt->execute($params);

  // jika query simpan berhasil, maka perusahaan sudah terubah
  // maka alihkan ke halaman about
  if($saved) header("Location: about.php");

}

// UPDATE `company` SET `name` = 'PT. Makmur Lentera Sejahtera (MLS BGT)', `address` = 'Jl. Mawar Jingga no 25 Jakarta', `phone` = '022948280001', `detail` = 'ini adalah deskripsi perusahaan\r\n\r\nvisi: \'misi\'\r\nmisi: \'visi\'' WHERE `company`.`id` = 1;
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
              <h4>Ubah Data Perusahaan</h4>
              
              <form name="edit_company" method="post" action="">
                <div class="form-group">
                  <label for="name">Nama Perusahaan</label>
                  <input class="form-control" type="text" name="name" placeholder="Nama Perusahaan" value="<?php echo $name;?>" autofocus />
                </div>
  
                <div class="form-group">
                  <label for="address">address</label>
                  <input class="form-control" type="text" name="address" placeholder="Alamat" value="<?php echo $address;?>" />
                </div>
  
                <div class="form-group">
                  <label for="phone">phone</label>
                  <input class="form-control" type="text" name="phone" placeholder="No. Telp" value="<?php echo $phone;?>" />
                </div>
  
                <div class="form-group">
                  <label for="detail">Detail</label>
                  <textarea class="form-control" type="textarea" name="detail" placeholder="Detail" value="<?php echo $detail;?>"><?php echo $detail;?></textarea>
                </div>
  
                <input type="submit" class="mt-4 btn btn-success btn-block" name="updateCompany" value="Ubah Data" />
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