<?php
include 'basic.php';
if (isset($_POST["name"])) {
  models_update($_POST["id"],$_POST["name"],$_POST["brand_id"]);
}
$model=models_edit($_GET["id"]);
$brands_list=brands_list();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Model  - <?php echo $app_name; ?> </title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container" style="width:700px";>
      <div class="row" style="margin-top:50px";>
        <h1 class="display-1 text-primary">Edit model</h1>
        <form action="model_edit.php" method="post" style="border:3px solid#f1f1f1";>
        <div class="form-group">
          <label for="id">ID</label>
          <input type="hidden" name="id" class="form-control" value="<?php echo $model["id"]; ?>">
        <div class="form-group">
          <label for="Name">Name</label>
          <input type="text" name="name" class="form-control" value="<?php echo $model["name"]; ?>">
        <div class="form-group">
          <label for="brand_id">Brand</label>
          <select class="form-control" name="brand_id">
            <?php while ($brand=mysqli_fetch_assoc($brands_list)) {?>
            <option <?php if($brand["id"]==$model["brand_id"]) {echo "SELECTED";}?>
              value="<?php echo $brand["id"]; ?>"><?php echo $brand["name"]; ?></option>
            <?php } ?>
          </select>
          <button type="submit" name="button" class="btn btn-dark">Save</button>
          <a href="#" class="btn btn-warning">Back</a>
      </div>
      </div>
    </form>
  </body>
</html>
