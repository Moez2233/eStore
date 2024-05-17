<?php
 function models_list($status="active"){
  global $conn;
  if($status=="active"){
    $sql= "SELECT models.*,brands.name AS brand_name
    FROM models,brands WHERE brands.id=models.brand_id and models.active =1";
  }
  elseif ($status=="deleted") {
    $sql= "SELECT models.*,brands.name AS brand_name
    FROM models,brands WHERE brands.id=models.brand_id and models.active =0";
  }
    $data = mysqli_query($conn,$sql);
    return $data;
  }
function models_new($name,$brand_id){
    global $conn;
    $sql="INSERT INTO models (name,brand_id) VALUES ('$name','$brand_id')";
    mysqli_query($conn,$sql);
    header("location:model_list.php");
  }
function models_delete($id,$action){
    global $conn;
    //$sql = "DELETE  FROM brands WHERE id='$id'";
    if($action=="deleted"){
      $sql = "UPDATE  models set active=0 WHERE id='$id'";
      $location = "model_list.php";
   }
    elseif ($action=="restore") {
      $sql = "UPDATE  models set active=1 WHERE id='$id'";
      $location = "model_trash.php";
    }
    elseif ($action == "forever") {
      $sql = "DELETE FROM models WHERE id='$id'";
      $location = "model_trash.php";
    }
    mysqli_query($conn,$sql);
    header("Location:$location");
  }
function models_edit($id){
    global $conn;
    $sql="SELECT * FROM models WHERE id='$id'";
    $models_list=mysqli_query($conn,$sql);
    $model=mysqli_fetch_assoc($models_list);
    return $model;
}
function models_update($id,$name,$brand_id){
    global $conn;
    $sql = "UPDATE models SET name='$name',brand_id='$brand_id' WHERE id='$id'";
    mysqli_query($conn,$sql);
    header("Location: model_list.php");
}
?>
