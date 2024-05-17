<?php
include 'basic.php';
if (isset($_POST["id"])) {
  labs_update($_POST["id"],$_FILES["image"],$_POST["model_id"],$_POST["color_id"],
  $_POST["price"],$_POST["year_id"]);
  }
$lab=labs_edit($_GET ["id"]);
$years_list=years_list();
$colors_list=colors_list();
$models_list=models_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New labs - <?php echo $app_name; ?> </title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container" style="width:700px";>
      <div class="row" style="margin-top:50px";>
    <form action="labs_edit.php" method="post" enctype="multipart/form-data" style="border:3px solid#f1f1f1";>
      <h1 class="display-1 text-primary">Edit labs</h1>
          <div class="form-group">
          <label for="id">ID</label>
           <input type="hidden" name="id"class="form-control"value="<?php echo $lab['id'];?>"><br><br>
           <div class="form-group">
             <label for="image">Image</label>
             <img class="lab-logo"src="img/labs/<?php echo $lab['image'];?>">
             <input type="file" name="image"class="form-control"><br><br>
           <div class="form-group">
          <label for="model_id">Model Id</label>
          <select name="model_id" class="form-control">
            <?php while ($model = mysqli_fetch_assoc($models_list)) {?>
              <option <?php if ($model ["id"]==$lab["model_id"]) { echo "SELECTED"; } ?>
                value= "<?php echo $model ["id"]; ?>" ><?php echo $model ["name"]; ?></option>
            <?php } ?>
          </select>
          <div class="form-group">
          <label for="color_id">Color Id</label>
          <select name="color_id" class="form-control">
            <?php while ($color = mysqli_fetch_assoc($colors_list)) {?>
              <option <?php if ($color ["id"]==$lab["color_id"]) { echo "SELECTED"; } ?>
                value= "<?php echo $color ["id"]; ?>" ><?php echo $color ["name"]; ?></option>
            <?php } ?>
          </select>
         <div class="form-group">
          <label for="price">Price</label>
          <input type="text" name="price"class="form-control"value="<?php echo $lab['price'];?>"><br><br>
          <div class="form-group">
          <label for="year_id">Year Id</label>
          <select name="year_id" class="form-control">
            <?php while ($year = mysqli_fetch_assoc($years_list)) {?>
              <option <?php if ($year ["id"]==$lab["year_id"]) { echo "SELECTED"; } ?>
                value= "<?php echo $year ["id"]; ?>" ><?php echo $year ["name"]; ?></option>
            <?php } ?>
          </select>
          <button type="submit" name="button" class="btn btn-dark">Save</button>
          <a href="#" class="btn btn-warning">Back</a>
        </div>
      </div>
    </form>
  </body>
</html>
