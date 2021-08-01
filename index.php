<!doctype html>
<?php
  require_once("database/config.php");
  session_start();
?>
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
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Info Teknisi</title>
  </head>
  <body>
    <?php 
      include("view/navbar.php");
    ?>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Bekerja dengan  <span>niat yang baik</span><br> menghasilkan hal yang <span>baik pula</span> Semangat!</h1>
        <a href="<?php echo $base_url ."/view/project.php"; ?>" class="btn-lg btn btn-primary tombol">Our Work</a>
      </div>
    </div>

     <!-- CONTAINER -->
    <div class="container">

      <!-- INFO PANEL -->
      <div class="row justify-content-center">
        <div class="col-10 info-panel">
          <div class="row">
            <div class="col-lg">
              <img src="img/employee.png"  alt="Employee" class="float-left">
              <h4>24 Hours</h4>
              <p>ini waktu duapuluh empat jam</p>
            </div>
            <div class="col-lg">
              <img src="img/hires.png" alt="Employee" class="float-left">
              <h4>24 Hours</h4>
              <p>ini waktu duapuluh empat jam</p>
            </div>
            <div class="col-lg">
              <img src="img/security.png" alt="Employee" class="float-left">
              <h4>24 Hours</h4>
              <p>ini waktu duapuluh empat jam</p>
            </div>
          </div>
        </div>
      </div>
    
    <!-- LEMBAR KERJA -->
    <div class="row workingspace">
      <div class="col--lg-6">
        <img src="img/workingspace.png" alt="workingspace" class="img-fluid">
      </div>
      <div class="col-lg-5">
        <h3>You <span>Work</span> Like At <span>Home</span></h3>
        <p>Bekerja dengan suasana hati yang lebih asik dan banyak hal baru setiap harinya</p>
        <a href="" class="btn btn-primary tombol">Galery</a>
      </div>
    </div>
    <!-- AKHIR LEMBAR KERJA -->
    <!-- TESTIMONIAL -->
    <section class="testimonial">
      <div class="row justify-content-center ">
        <div class="col-lg-8">
          <h5>"Bekerja dengan suasana hati akan menjadi lebih baik dalam mengerjakanya dan mempelajari hal baru tiap harinya"</h5>
        </div>
      </div>  

      <div class="row justify-content-center">
        <div class="col-lg-6 justify-content-center d-flex">
        <figure class="figure">
          <img src="img/img1.png" class="figure-img img-fluid rounded-circle" alt="Testi 1">
          </figcaption>
        </figure>
        <figure class="figure">
          <img src="img/img2.png" class="figure-img img-fluid rounded-circle utama" alt="Testi 2">
          <figcaption class="figure-caption">
            <h5>Bean</h5>
            <p>Technician</p>
          </figcaption>
        </figure>
        <figure class="figure">
          <img src="img/img3.png" class="figure-img img-fluid rounded-circle" alt="Testi 3">
          </figcaption>
        </figure>
        </div>
      </div>    
    </section>
    <!-- AKHIR TESTIMONIAL -->

    <?php include("view/footer.php");?>

    <!-- Akhir CONTAINER  -->

    <!-- Akhir Jumbotron -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>

  <style>
    #home-header {
      background: rgba(123, 123, 123, 0.3) !important;
    }
  </style>

  <script>
    var header = document.getElementById("home-header");
    // console.log('header', header);
    
    // console.log('header', header.style);
    window.onscroll = () => { 
      // console.log(document.documentElement.scrollTop);
      // console.log(header.style);
      if (document.documentElement.scrollTop > 100) {
        // console.log("after", header.style);
        header.style.display = "none"
      } else {
        // header.style.background = "rgba(123, 123, 123, 0.3) !important"
        header.style.display = "block"
      }
    }
  </script>
</html>