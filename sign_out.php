<?php
include 'basic.php';
unset($_SESSION["username"]);
session_destroy();
header("location:sign_in.php");
 ?>
