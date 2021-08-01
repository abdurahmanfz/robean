<?php
require_once("../database/config.php");

session_start();
unset($_SESSION["user"]);
header("Location: ".$base_url."/index.php");