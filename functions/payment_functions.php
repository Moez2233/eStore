<?php
 function payment_list($status="active"){
  global $conn;
  if($status=="active"){
    $sql = "SELECT * FROM payment_methods where active =1";
  }
  elseif ($status=="deleted") {
    $sql = "SELECT * FROM payment_methods where active =0";
  }
    $data = mysqli_query($conn,$sql);
    return $data;
  }
function payment_new($name){
    global $conn;
    $sql="INSERT INTO payment_methods (name) VALUES ('$name')";
    mysqli_query($conn,$sql);
    header("location:payment_list.php");
  }
function payment_delete($id,$action){
    global $conn;
    //$sql = "DELETE  FROM payment_methods WHERE id='$id'";
    if($action=="deleted"){
      $sql = "UPDATE  payment_methods set active=0 WHERE id='$id'";
      $location = "payment_list.php";
   }
    elseif ($action=="restore") {
      $sql = "UPDATE  payment_methods set active=1 WHERE id='$id'";
      $location = "payment_trash.php";
    }
    mysqli_query($conn,$sql);
    header("Location:$location");
  }
function payment_edit($id){
    global $conn;
    $sql = "SELECT * FROM payment_methods WHERE id='$id'";
    $data = mysqli_query($conn,$sql);
    $payment=mysqli_fetch_assoc($data);
    return $payment;
}
function payment_update($id,$name){
    global $conn;
    $sql="UPDATE payment_methods SET name='$name' WHERE id='$id'";
    mysqli_query($conn,$sql);
    header("Location:payment_list.php");
}

?>
