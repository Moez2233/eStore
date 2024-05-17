<?php
include 'basic.php';
if (isset($_POST["id"])) {
  cities_update($_POST["id"],$_POST["name"],$_FILES["image"],$_POST["delivery"]);
}
$city=cities_edit($_GET ["id"]);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit City - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container" style="width:700px";>
      <div class="row" style="margin-top:50px";>
    <form action="cities_edit.php" method="post" enctype="multipart/form-data" style="border:3px solid#f1f1f1";>
      <h1 class="display-1 text-primary" >Edit City</h1>
       <div class="form-group">
          <input class="form-control" type="hidden" name="id" value="<?php echo $city['id'];?>"><br><br>
       <div class="form-group">
          <label for="image">Image</label>
          <img class="city-logo"src="img/cities/<?php echo $city['image'];?>">
          <input class="form-control" type="file" name="image"><br><br>
       <div class="form-group">
          <label for="Name">Name</label>
          <input class="form-control" type="text" name="name" value="<?php echo $city['name'];?>"><br><br>
       <div class="form-group">
          <label for="Delivery">Shippin Delivery</label>
          <input class="form-control" type="text" name="delivery" value="<?php echo $city['shippindelivery'];?>"><br><br>
      <button class="btn btn-secondary  " type="submit" name="button">Save</button>
      <a class="btn btn-danger " href="#">Back</a>

        </div>
    </form>
  </body>
</html>
