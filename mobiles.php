<?php
include 'basic.php';
$data=mobiles_list();
if(isset($_GET['id'])){
  $id= $_GET['id'];
  global $conn;
  $sql = "UPDATE mobiles SET cart = 1 WHERE id = '$id'";
  mysqli_query($conn, $sql);
  header("Location:cart_mobile.php");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mobiles List - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar1.php'; ?>
    <div style="background-color: lavender;">
    <div class="container">
    <h2 class="display-1">Mobiles List</h2>
    <a class="btn btn-dark mb-5" href="mobiles_new.php">New Mobile</a>
    <div class="container">
      <div class="row">
    <?php while($mobile = mysqli_fetch_assoc($data)) {?>
        <div class ="col-sm-4">
          <div class='card' style='width: 15rem;'>
                <img src="img/mobiles/<?php echo $mobile["image"];?>" class='card-img-top'>
                <div class='card-body'>
                  <h5 class="card-title"><?php echo $mobile["model_name"]; ?></h5>
                  <h5 class="card-title"><?php echo $mobile["color_name"]; ?></h5>
                    <p class="card-text" style="font-weight:bold;"><?php echo $mobile["price"]; ?></p>
                    <p class="card-title" style="font-weight:bold;"><?php echo $mobile["year_name"]; ?></p>
                    <a class="btn btn-danger"   href="mobiles.php?id=<?php echo $mobile["id"];?>">Add to cart</a>
                </div>
            </div>
          </div>
  <?php } ?>
</div>
  </body>
</html>
