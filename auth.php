<?php
  require_once("database/config.php");

  session_start();
  if(!isset($_SESSION["user"])) header("Location: ".$base_url."/view/login.php");