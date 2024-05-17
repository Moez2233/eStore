<?php
 function users_list(){
  global $conn;
    $sql = "SELECT * FROM users";
    $data = mysqli_query($conn,$sql);
    return $data;
  }
  function users_delete($id){
      global $conn;
      $sql = "DELETE  FROM users WHERE id='$id'";
      mysqli_query($conn,$sql);
      header("Location: users_list.php");
    }
  function users_edit($id){
      global $conn;
      $sql = "SELECT * FROM users WHERE id='$id'";
      $data = mysqli_query($conn,$sql);
      $user=mysqli_fetch_assoc($data);
      return $user;
  }
  function users_update($id,$fullname,$username,$pass,$admin){
      global $conn;
      $password=password_hash($pass,PASSWORD_BCRYPT);
      $sql ="UPDATE users SET fullname='$fullname',username='$username',password='$password',admin='$admin' WHERE id='$id'";
      mysqli_query($conn,$sql);
      header("Location:users_list.php");
  }

  ?>
