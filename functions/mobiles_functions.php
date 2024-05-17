<?php
 function mobiles_list($status="active"){
  global $conn;
  if($status=="active"){
    $sql="SELECT mobiles.*,models.name AS model_name,colors.name AS color_name,years.name
    AS year_name FROM mobiles,models,colors,years WHERE models.id=mobiles.model_id
    AND colors.id=mobiles.color_id AND years.id=mobiles.year_id AND mobiles.active =1";
  }
  elseif ($status=="deleted") {
    $sql="SELECT mobiles.*,models.name AS model_name,colors.name AS color_name,years.name
    AS year_name FROM mobiles,models,colors,years WHERE models.id=mobiles.model_id
    AND colors.id=mobiles.color_id AND years.id=mobiles.year_id AND mobiles.active =0";
  }
    $data = mysqli_query($conn,$sql);
    return $data;
  }
function mobiles_new($image,$model_id,$color_id,$price,$year_id){
    global $conn;
    $sql ="INSERT INTO mobiles (image,model_id,color_id,price,year_id)
    VALUES('$image','$model_id','$color_id','$price','$year_id')";
    mysqli_query($conn,$sql);
    header("location:mobiles_list.php");
  }
function mobiles_delete($id,$action){
    global $conn;
    //$sql = "DELETE  FROM mobiles WHERE id='$id'";
    if($action=="deleted"){
      $sql = "UPDATE  mobiles set active=0 WHERE id='$id'";
      $location = "mobiles_list.php";
   }
    elseif ($action=="restore") {
      $sql = "UPDATE  mobiles set active=1 WHERE id='$id'";
      $location = "mobiles_trash.php";
    }
    elseif ($action == "forever") {
      $sql = "DELETE FROM mobiles WHERE id='$id'";
      $location = "mobiles_trash.php";
    }
    mysqli_query($conn,$sql);
    header("Location:$location");
  }
function mobiles_edit($id){
    global $conn;
    $sql = "SELECT * FROM mobiles WHERE id='$id'";
    $data = mysqli_query($conn,$sql);
    $mobile=mysqli_fetch_assoc($data);
    return $mobile;
}
function mobiles_update($id,$image,$model_id,$color_id,
  $price,$year_id){
    global $conn;
    if ($image["name"]!="") {
        $tmp_name =$image["tmp_name"];
        $location ="img/mobiles/";
        $filename=strtolower($model_id);
        $filename=str_replace(" ","-",$filename);
        $filename=$filename."-logo.png";

        move_uploaded_file($tmp_name,$location.$filename);
    $sql = "UPDATE mobiles SET image='$filename',model_id='$model_id',color_id='$color_id'
    ,price='$price',year_id='$year_id' WHERE id='$id'";
  }
  else {
    $sql = "UPDATE mobiles SET model_id='$model_id',color_id='$color_id'
    ,price='$price',year_id='$year_id' WHERE id='$id'";
  }
     mysqli_query($conn,$sql);
     header("Location:mobiles_list.php");
}

?>
