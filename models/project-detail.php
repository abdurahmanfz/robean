<?php
  include_once("../database/config.php");

  $proj_id = $_GET["id"];

  $result = mysqli_query($mysqli, "SELECT * FROM projects where `id` = $proj_id");
