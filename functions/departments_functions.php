<?php
 function departments_list($status="active"){
  global $conn;
  if($status=="active"){
    $sql="SELECT * FROM departments where active =1";
  }
  elseif ($status=="deleted") {
    $sql="SELECT * FROM departments where active =0";
  }
    $data = mysqli_query($conn,$sql);
    return $data;
  }
function departments_new($department){
    global $conn;
    $sql = "INSERT INTO departments (name) VALUES ('$department')";
    mysqli_query($conn,$sql);
    header("location:departments_list.php");
  }
function departments_delete($id,$action){
    global $conn;
    //$sql = "DELETE  FROM brands WHERE id='$id'";
    if($action=="deleted"){
      $sql = "UPDATE  departments set active=0 WHERE id='$id'";
      $location = "departments_list.php";
   }
    elseif ($action=="restore") {
      $sql = "UPDATE  departments set active=1 WHERE id='$id'";
      $location = "departments_trash.php";
    }
    mysqli_query($conn,$sql);
    header("Location:$location");
  }
function departments_edit($id){
    global $conn;
    $sql = "SELECT * FROM departments WHERE id='$id'";
    $data = mysqli_query($conn,$sql);
    $department=mysqli_fetch_assoc($data);
    return $department;
}
function departments_update($id,$name){
    global $conn;
    $sql="UPDATE departments SET name = '$name' WHERE id='$id'";
    mysqli_query($conn,$sql);
    header("Location:departments_list.php");
}

?>
