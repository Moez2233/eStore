<?php
include 'basic.php';
  if (isset($_POST["name"])) {
   models_new($_POST["name"] , $_POST["brand_id"]);
}
$brands_list=brands_list();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Model - <?php echo $app_name;?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container" style="width:700px";>
      <div class="row" style="margin-top:50px";>
        <h1 class="display-1 text-warning">New Model</h1>
          <form  action="model_new.php" method="post" style="border:3px solid#f1f1f1";>
            <div class="form-group" >
              <label for="name">Name</label>
              <input type="text" name="name"class="form-control">
            <div class="form-group" >
              <label for="brand_id">Brand</label>
              <select class="form-control" name="brand_id">
                <?php while($brand=mysqli_fetch_assoc($brands_list)) {?>
                  <option value="<?php echo $brand["id"]; ?>"><?php echo $brand["name"]; ?></option>
                <?php } ?>

              </select>
              <button type="submit" name="button" class="btn btn-dark">Save</button>
             <a href="#"  class="btn btn-secondary">Back</a>
         </div>
       </div>
</form>
  </body>
</html>
