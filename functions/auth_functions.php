<?php
function get_user($username){
  global $conn;
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $data = mysqli_query($conn,$sql);
  $rec = mysqli_fetch_assoc($data);
  return $rec;
}
function create_user($fn,$un,$pass){
  global $conn;
  $password = password_hash($pass,PASSWORD_BCRYPT);
  $sql= "INSERT INTO users (fullname,username,password) VALUES ('$fn','$un','$password')";
  mysqli_query($conn,$sql);
  header("location:sign_in.php");
}
 ?>
