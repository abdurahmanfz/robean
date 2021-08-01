<!-- Awal Navbar -->
<nav class="navbar navbar-expand-lg bg-primary py-4 header-home" id="home-header" style="margin-bottom: 50px;">
  <div class="container">
    <a class="navbar-brand" href="<?php echo $base_url . "/index.php"; ?>">Info Teknisi</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <!-- <a class="font-weight-bold nav-link mx-2" href="https://www.ainosi.co.id/homepage/">Home</a> -->
        <!-- <a class="font-weight-bold nav-link mx-2" href="http://localhost/absen_pkl/index.php">Absensi</a> -->
        
        <a class="font-weight-bold nav-link mx-2" href="<?php echo $base_url.'/view/galery.php'; ?>">Galery</a>
        <a class="font-weight-bold nav-link mx-2" href="<?php echo $base_url.'/view/about.php'; ?>">About</a>
        <?php if (!isset($_SESSION["user"])) { ?>
          <a class='font-weight-bold nav-item bg-success nav-link mx-2' 
            href="<?php echo $base_url; ?>/view/login.php"
          >Login</a> &nbsp;
        <?php } else { ?> 
          <?php if ($_SESSION["user"]["role"] == "adm") { ?>
            <a class='font-weight-bold nav-link mx-2' 
              href="<?php echo $base_url; ?>/admin/"
            >Admin</a> &nbsp;
          <?php } ?> 
          <a class="font-weight-bold nav-link mx-2" href="<?php echo $base_url.'/view/schedule.php'; ?>">Jadwal</a>
          <a class='font-weight-bold nav-item bg-danger nav-link mx-2' 
            href="<?php echo $base_url; ?>/view/logout.php"
          >Logout</a>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>
<!-- Akhir Navbar -->