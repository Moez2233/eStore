<?php
function cart_list1(){
  global $conn;
    $sql = "SELECT * FROM labs WHERE cart = 1";
  $data = mysqli_query($conn, $sql);
  return $data;
}



function cart1($id, $action){
    global $conn;
    if ($action == "add"){
        $sql = "UPDATE labs SET cart = 1 WHERE id = '$id'";
        $location = "cart_lab.php";
    } elseif($action == "restore"){
        $sql = "UPDATE labs SET cart = 0 WHERE id = '$id'";
        $location = "cart_lab.php";
    }
    mysqli_query($conn, $sql);
    header("Location: $location");
  }
