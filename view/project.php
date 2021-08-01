<?php
  require("../models/projects.php");  
  require_once("../auth.php");

  if(isset($_POST['delete'])){
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    echo 'delete';

    $db->prepare("DELETE FROM projects WHERE id=?")->execute([$id]);

    if($db) header("Location: project.php");
}
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

    <title>Projects | <?php echo $main_title ?></title>
  </head>
  <body>
    <?php include("../view/navbar.php");?>

    <div class="container" style="margin-top: 150px">
      <h1 class="text-center mb-4">Our Work</h1>
      <div class="row">
        <?php while($project = mysqli_fetch_array($result)) { ?>
          <a class="crd-link" href="<?php echo $base_url . '/view/project-detail.php' . '?id=' . $project['id']?>">
            <div class="add-card card" style="width: 22rem; margin: 10px;">
              <img class="card-img-top" src="<?php echo $project['image']?>" alt="Card image cap" style="width: 100%; height: 220px; object-fit: cover;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $project['name']?></h5>
                <p class="card-text"><?php echo $project['description']?></p>
                <p class="card-text"><small class="text-muted"><?php echo $project['client_name']?> - <?php echo $project['timestamp']?></small></p>
              </div>
              <?php if($_SESSION["user"]["role"] == "adm" ) { ?>
                <form action="" method="POST">
                  <div class="card-footer bg-transparent text-right">
                    <a href='project-add.php?edit=true&id=<?php echo $project['id']?>'>
                      <input type="button" class="btn btn-primary" value="Edit" />
                    </a>

                    <input type="text" name="id" hidden value="<?php echo $project['id']?>">
                    <input type="submit" class="btn btn-danger" name="delete" value="Hapus" />
                  </div>
                </form>
              <?php } ?>
            </div>
          </a>
        <?php } ?>

        <?php if($_SESSION["user"]["role"] == "adm" ) { ?>
          <div class="add-card card" style="width: 22rem; margin: 10px;">
            <div class="mt-5 card-body mx-auto">
              <img class="card-img-top" src="../img/plus.png" alt="add project" style="width: 100%; height: 220px; object-fit: contain; opacity: 0.4">
            </div>
            <div class="card-footer bg-transparent text-right"><a href='project-add.php'>Tambah</a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <?php include("../view/footer.php");?>
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
      box-shadow: 0px 0px 8px;
      cursor: pointer;
    } 
    a:link {
      text-decoration: none;
      color: black;
    } 
    a:visited {
      text-decoration: none;
      color: black;
    }
    a:hover {
      text-decoration: none;
      color: black;
    }
    a:active {
      text-decoration: none;
      color: black;
    }
  </style>
</html>