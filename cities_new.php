<?php
include 'basic.php';
if (isset($_POST["name"])) {
//geting the image tmp name
  $name =$_FILES["image"]["tmp_name"];
  //seting location
  $location ="img/cities/";
  //naming image
  $filename=strtolower($_POST["name"]);
  $filename=str_replace(" ","-",$filename);
  $filename=$filename."-logo.png";
  //uploadind
  move_uploaded_file($name,$location.$filename);
  //saving
  cities_new( $_POST["name"],$filename,$_POST["delivery"]);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New City - <?php echo $app_name;?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container" style="width:700px";>
      <div class="row" style="margin-top:50px";>
        <h1 class="display-1">New City</h1>
        <form  action="cities_new.php" method="post" enctype="multipart/form-data" style="border:3px solid#f1f1f1";>
          <div class="form-group mb-4" >
           <label for="image">Image</label>
           <input type="file" name="image" class="form-control"><br><br>
           <div class="form-group" >
            <label for="Name">Name</label>
            <input type="text" name="name" class="form-control"><br><br>
            <div class="form-group" >
           <label for="delivery">Shippin Delivery</label>
           <input type="text" name="delivery" class="form-control"><br><br>
           <button type="submit" name="button" class="btn btn-dark">Save</button>
          <a href="#"  class="btn btn-secondary">Back</a>
      </div>
    </div>
</form>
  </body>
</html>