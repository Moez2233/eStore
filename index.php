<?php
include 'basic.php';
if (!isset($_SESSION["username"])) {
  header("location:sign_in.php");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style media="screen">
    </style>
    <meta charset="utf-8">
    <title>Dashbord - <?php echo $app_name; ?> </title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar1.php';?>
    <body>
      <div style="background-color:lavender";>
        <h1 style="text-align:center; color:darkblue; font-weight:bold; font-size:50px;">E.store</h1>
        <span style="padding: 10px;"></span>
        <div class="card-group" style="padding: 20px;">
            <div class="card rounded" style="padding: 40px;">
              <a href="mobiles.php"><img src="img/images (6).jpg" class="card-img-top" ></a>

            </div>
            <span style="padding: 10px;"></span>
            <div class="card rounded" style="padding: 40px;">
                <img src="img/two.jpeg" class="card-img-top" >

            </div>
            <span style="padding: 10px;"></span>
            <div class="card rounded" style="padding: 40px;">
              <a href="labs.php"><img src="img/f.webp" class="card-img-top" ></a>
            </div>
        </div>
</body>
