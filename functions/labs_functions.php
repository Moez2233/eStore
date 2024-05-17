<?php
 function labs_list($status="active"){
  global $conn;
  if($status=="active"){
    $sql="SELECT labs.*,models.name AS model_name,colors.name AS color_name,years.name
    AS year_name FROM labs,models,colors,years WHERE models.id=labs.model_id
    AND colors.id=labs.color_id AND years.id=labs.year_id AND labs.active =1";
  }
  elseif ($status=="deleted") {
    $sql="SELECT labs.*,models.name AS model_name,colors.name AS color_name,years.name
    AS year_name FROM labs,models,colors,years WHERE models.id=labs.model_id
    AND colors.id=labs.color_id AND years.id=labs.year_id AND labs.active =0";
  }
    $data = mysqli_query($conn,$sql);
    return $data;
  }
function labs_new($image,$model_id,$color_id,$price,$year_id){
    global $conn;
    $sql ="INSERT INTO labs (image,model_id,color_id,price,year_id)
    VALUES('$image','$model_id','$color_id','$price','$year_id')";
    mysqli_query($conn,$sql);
    header("location:labs_list.php");
  }
function labs_delete($id,$action){
    global $conn;
    //$sql = "DELETE  FROM labs WHERE id='$id'";
    if($action=="deleted"){
      $sql = "UPDATE  labs set active=0 WHERE id='$id'";
      $location = "labs_list.php";
   }
    elseif ($action=="restore") {
      $sql = "UPDATE  labs set active=1 WHERE id='$id'";
      $location = "labs_trash.php";
    }
    elseif ($action == "forever") {
      $sql = "DELETE FROM labs WHERE id='$id'";
      $location = "labs_trash.php";
    }
    mysqli_query($conn,$sql);
    header("Location:$location");
  }
function labs_edit($id){
    global $conn;
    $sql = "SELECT * FROM labs WHERE id='$id'";
    $data = mysqli_query($conn,$sql);
    $lab=mysqli_fetch_assoc($data);
    return $lab;
}
function labs_update($id,$image,$model_id,$color_id,
  $price,$year_id){
    global $conn;
    if ($image["name"]!="") {
        $tmp_name =$image["tmp_name"];
        $location ="img/labs/";
        $filename=strtolower($model_id);
        $filename=str_replace(" ","-",$filename);
        $filename=$filename."-logo.png";

        move_uploaded_file($tmp_name,$location.$filename);
    $sql = "UPDATE labs SET image='$filename',model_id='$model_id',color_id='$color_id'
    ,price='$price',year_id='$year_id' WHERE id='$id'";
  }
  else {
    $sql = "UPDATE labs SET model_id='$model_id',color_id='$color_id'
    ,price='$price',year_id='$year_id' WHERE id='$id'";
  }
     mysqli_query($conn,$sql);
     header("Location:labs_list.php");
}

?>
