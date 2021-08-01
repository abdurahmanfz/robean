<?php
  include_once("../database/config.php");

  $result = mysqli_query($mysqli, "SELECT * FROM projects ORDER BY id DESC");
