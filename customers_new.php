<?php
include 'basic.php';
if (isset($_POST["name"])) {
  //geting the image tmp name
    $name =$_FILES["image"]["tmp_name"];
    //seting location
    $location ="img/customers/";
    //naming image
    $filename=strtolower($_POST["name"]);
    $filename=str_replace(" ","-",$filename);
    $filename=$filename."-logo.png";
    //uploadind
    move_uploaded_file($name,$location.$filename);
    //saving
    customers_new($_POST["name"],$filename,$_POST["phone"],$_POST["address"],$_POST["email"],$_POST["bdate"],$_POST["city_id"]);
}
$cities_list=cities_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Customers - <?php echo $app_name;?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container" style="width:700px";>
      <div class="row" style="margin-top:50px";>
        <h1 class="display-1 text-primary">New Customers</h1>
        <form action="customers_new.php" method="post" enctype="multipart/form-data" style="border:3px solid#f1f1f1";>
          <div class="form-group mb-4" >
           <label for="image">Image</label>
           <input type="file" name="image" class="form-control"><br><br>
          <div class="form-group">
            <label for="Name">Name</label>
            <input class="form-control" type="text" name="name">
          </div>
          <div class="form-group">
          <label for="Phone">Phone</label>
          <input class="form-control" type="text" name="phone">
        </div>
        <div class="form-group">
          <label for="Address">Address</label>
          <input class="form-control" type="text" name="address">
        </div>
        <div class="form-group">
          <label for="Email">Email</label>
          <input class="form-control" type="email" name="email">
        </div>
        <div class="form-group">
          <label for="Bdate">Birthday Date</label>
          <input class="form-control" type="date" name="bdate">
        </div>

        <div class="form-group">
          <label>City ID</label>
          <select name="city_id"  class="form-control">
            <?php while ($city = mysqli_fetch_assoc($cities_list)) {?>
              <option value= "<?php echo $city ["id"]; ?>" ><?php echo $city ["name"]; ?></option>
            <?php } ?>
          </select>

        <button type="submit" name="button" class="btn btn-dark">Save</button>
       <a href="#"  class="btn btn-secondary">Back</a>
   </div>
 </div>
        </form>
      </div>
    </div>

  </body>
</html>
