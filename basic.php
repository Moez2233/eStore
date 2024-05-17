<?php
$conn =mysqli_connect('localhost','root','','estore');
$app_name = "e.store";
$logo = "logo.png";
include 'functions\all.php';
session_start();
$su="/sama14/sign_up.php";
$si="/sama14/sign_in.php";
if ($_SERVER["REQUEST_URI"]!= $si && $_SERVER["REQUEST_URI"]!= $su) {
    if (!isset($_SESSION["username"])) {
      header("location:sign_in.php");
    }
}
 ?>
