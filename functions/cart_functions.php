<?php
function cart_list(){
  global $conn;
    $sql = "SELECT * FROM mobiles WHERE cart = 1";
  $data = mysqli_query($conn, $sql);
  return $data;
}



function cart($id, $action){
    global $conn;
    if ($action == "add"){
        $sql = "UPDATE mobiles SET cart = 1 WHERE id = '$id'";
        $location = "cart_mobile.php";
    } elseif($action == "restore"){
        $sql = "UPDATE mobiles SET cart = 0 WHERE id = '$id'";
        $location = "cart_mobile.php";
    }
    mysqli_query($conn, $sql);
    header("Location: $location");
  }
