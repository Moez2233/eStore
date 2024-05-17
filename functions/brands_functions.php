<?php
 function brands_list($status="active"){
  global $conn;
  if($status=="active"){
    $sql = "SELECT * FROM brands where active =1";
  }
  elseif ($status=="deleted") {
    $sql = "SELECT * FROM brands where active =0";
  }
    $data = mysqli_query($conn,$sql);
    return $data;
  }
function brands_new($brand,$image){
    global $conn;
    $sql = "INSERT INTO brands (name,image) VALUES ('$brand','$image')";
    mysqli_query($conn,$sql);
    header("location:brands_list.php");
  }
function brands_delete($id,$action){
    global $conn;
    //$sql = "DELETE  FROM brands WHERE id='$id'";
    if($action=="deleted"){
      $sql = "UPDATE  brands set active=0 WHERE id='$id'";
      $location = "brands_list.php";
   }
    elseif ($action=="restore") {
      $sql = "UPDATE  brands set active=1 WHERE id='$id'";
      $location = "brands_trash.php";
    }
    elseif ($action == "forever") {
      $sql = "DELETE FROM brands WHERE id='$id'";
      $location = "brands_trash.php";
    }
    mysqli_query($conn,$sql);
    header("Location:$location");
  }
function brands_edit($id){
    global $conn;
    $sql = "SELECT * FROM brands WHERE id='$id'";
    $data = mysqli_query($conn,$sql);
    $brand=mysqli_fetch_assoc($data);
    return $brand;
}
function brands_update($id,$name,$imagefile){
    global $conn;
    if ($imagefile["name"]!="") {
        $tmp_name =$imagefile["tmp_name"];
        $location ="img/brands/";
        $filename=strtolower($name);
        $filename=str_replace(" ","-",$filename);
        $filename=$filename."-logo.png";

        move_uploaded_file($tmp_name,$location.$filename);
    $sql="UPDATE brands SET name = '$name', image='$filename' WHERE id='$id'";
  }
  else {
    $sql="UPDATE brands SET name = '$name' WHERE id='$id'";
  }
    mysqli_query($conn,$sql);
    header("Location:brands_list.php");
}

?>
