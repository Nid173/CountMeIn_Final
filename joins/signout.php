<?php
include 'db.php';
include 'config.php';
session_start();
unset($_SESSION);
session_destroy();
mysqli_close($connection);
if(!isset($_SESSION["id"]))
  header('Location:'.URL.'Index.php');
