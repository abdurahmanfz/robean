<?php
  include_once("../database/config.php");

  $empl_query = mysqli_query($mysqli, "SELECT COUNT(*) FROM `users` where `role` = 'emp'");
  $empl_row = mysqli_fetch_array($empl_query);
  $empl_count = $empl_row["COUNT(*)"];
   
  $proj_query = mysqli_query($mysqli, "SELECT COUNT(*) FROM `projects`");
  $proj_row = mysqli_fetch_array($proj_query);
  $proj_count = $proj_row["COUNT(*)"];
   
  $schd_query = mysqli_query($mysqli, "SELECT COUNT(*) FROM `schedule`");
  $schd_row = mysqli_fetch_array($schd_query);
  $schd_count = $schd_row["COUNT(*)"];
   
