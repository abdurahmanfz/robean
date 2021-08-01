<?php
  include_once("../database/config.php");

  $result = mysqli_query($mysqli, "SELECT * FROM company where id = 1");
