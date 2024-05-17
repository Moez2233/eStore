<?php
 function years_list($status="active"){
  global $conn;
  if($status=="active"){
    $sql="SELECT * FROM years where active =1";
  }
  elseif ($status=="deleted") {
    $sql="SELECT * FROM years where active =0";
  }
    $data = mysqli_query($conn,$sql);
    return $data;
  }
function years_new($year){
    global $conn;
    $sql="INSERT INTO years (name) VALUES ('$year')";
    mysqli_query($conn,$sql);
    header("location:years_list.php");
  }
function years_delete($id,$action){
    global $conn;
    //$sql = "DELETE  FROM brands WHERE id='$id'";
    if($action=="deleted"){
      $sql = "UPDATE  years set active=0 WHERE id='$id'";
      $location = "years_list.php";
   }
    elseif ($action=="restore") {
      $sql = "UPDATE  years set active=1 WHERE id='$id'";
      $location = "years_trash.php";
    }
    mysqli_query($conn,$sql);
    header("Location:$location");
  }
function years_edit($id){
    global $conn;
    $sql = "SELECT * FROM years WHERE id='$id'";
    $data = mysqli_query($conn,$sql);
    $year=mysqli_fetch_assoc($data);
    return $year;
}
function years_update($id,$name){
    global $conn;
    $sql="UPDATE years SET name='$name' WHERE id='$id'";
    mysqli_query($conn,$sql);
    header("Location:years_list.php");
}

?>
