<?php
include 'basic.php';
if (isset($_POST["id"])) {
customers_update($_POST["id"],$_POST["name"],$_FILES["image"],$_POST["phone"],$_POST["address"]
,$_POST["email"],$_POST["bdate"],$_POST["city_id"],$_FILES["image"]);
}
$customer = customers_edit($_GET ["id"]);
$cities_list=cities_list();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Customer</title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container" style="width:700px";>
      <div class="row" style="margin-top:50px";>
    <form action="customers_edit.php" method="post" enctype="multipart/form-data" style="border:3px solid#f1f1f1";>
      <h1 class="display-1 text-primary">Edit Customer</h1>
        <div class="form-group">
          <label for="id">ID</label>
          <input class="form-control" type="hidden" name="id" value="<?php echo $customer["id"]; ?>"><br>
        <div class="form-group">
          <label for="image">Image</label>
          <img class="customer-logo"src="img/customers/<?php echo $customer['image'];?>">
          <input class="form-control" type="file" name="image"><br><br>
        <div class="form-group">
              <label for="Name">Name</label>
              <input class="form-control" type="text" name="name"value="<?php echo $customer["name"]; ?>"><br>
        <div class="form-group">
          <label for="Phone">Phone</label>
          <input class="form-control" type="text" name="phone"value="<?php echo $customer["phone"]; ?>"><br>
       <div class="form-group">
            <label for="Address">Address</label>
          <input class="form-control" type="text" name="address"value="<?php echo $customer["address"]; ?>"><br>
        <div class="form-group">
          <label for="Email">Email</label>
          <input class="form-control" type="email" name="email"value="<?php echo $customer["email"]; ?>"><br>
        <div class="form-group">
          <label for="Bdate">Birthday Date</label>
          <input class="form-control" type="date" name="bdate"value="<?php echo $customer["bdate"]; ?>"><br>
      <div class="form-group">
      <label for="City ID">City ID</label>
      <select name="city_id" class="form-control">
        <?php while ($city = mysqli_fetch_assoc($cities_list)) {?>
          <option <?php if ($city ["id"]==$customer["city_id"]) { echo "SELECTED"; } ?>
            value= "<?php echo $city ["id"]; ?>" ><?php echo $city ["name"]; ?></option>
        <?php } ?>
      </select>
      <button type="submit" name="button" class="btn btn-dark">Save</button>
      <a href="#" class="btn btn-dang">Back</a>
    </div>
    </form>
  </body>
</html>
