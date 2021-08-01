<?php
  include_once("../database/config.php");

  $result = mysqli_query($mysqli, "SELECT * FROM `users` WHERE role = 'emp'");
