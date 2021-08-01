<?php
  include_once("../database/config.php");
  $month = date('n');

  $result = mysqli_query($mysqli, 
    "SELECT schedule.id, schedule.user_id, users.name, schedule.senin, schedule.selasa, schedule.rabu, schedule.kamis, schedule.jumat, schedule.sabtu, schedule.minggu, schedule.note 
    FROM schedule 
    INNER JOIN users ON schedule.user_id=users.id"
  );
