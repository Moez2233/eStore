<?php
function colors_list($status="active"){
  global $conn;
  if($status=="active"){
   $sql = "SELECT * FROM colors WHERE active =1";
  }
  elseif ($status=="deleted") {
   $sql = "SELECT * FROM colors WHERE active =0";
  }
  $data = mysqli_query($conn,$sql);
  return $data;
}
function colors_new($name,$code){
  global $conn;
  $sql="INSERT INTO colors (name,code) VALUES ('$name','$code')";
  mysqli_query($conn,$sql);
  header("location:colors_list.php");
  }
function colors_delete($id,$action){
  global $conn;
  //$sql = "DELETE  FROM cars WHERE id='$id'";
  if($action=="deleted"){
  $sql = "UPDATE colors set active=0 WHERE id='$id'";
  $location = "colors_list.php";
 }
  elseif ($action=="restore") {
    $sql = "UPDATE  colors set active=1 WHERE id='$id'";
    $location = "colors_trash.php";
  }
  mysqli_query($conn,$sql);
  header("Location:$location");
}
function colors_edit($id){
  global $conn;
  $sql = "SELECT * FROM colors WHERE id='$id'";
  $data = mysqli_query($conn,$sql);
  $color=mysqli_fetch_assoc($data);
  return $color;
}
function colors_update($id,$name,$code){
  global $conn;
  $sql="UPDATE colors SET name='$name',code='$code' WHERE id='$id'";
  mysqli_query($conn,$sql);
  header("Location:colors_list.php");
}

 ?>
