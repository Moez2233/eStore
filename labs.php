<?php
include 'basic.php';
$data=labs_list();
if(isset($_GET['id'])){
  $id= $_GET['id'];
  global $conn;
  $sql = "UPDATE labs SET cart = 1 WHERE id = '$id'";
  mysqli_query($conn, $sql);
  header("Location:cart_lab.php");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>labs List - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar1.php'; ?>
    <div style="background-color: lavender;">
    <div class="container">
      <h2 class="display-1">labs List</h2>
      <a class="btn btn-dark mb-5" href="labs_new.php">New lab</a>
      <div class="row">
    <?php while($lab = mysqli_fetch_assoc($data)) {?>
      <div class ="col-sm-4">
        <div class='card' style='width: 15rem;'>
              <img src="img/labs/<?php echo $lab["image"];?>" class='card-img-top'>
              <div class='card-body'>
                <h5 class="card-title"><?php echo $lab["model_name"]; ?></h5>
                <h5 class="card-title"><?php echo $lab["color_name"]; ?></h5>
                  <p class="card-text" style="font-weight:bold;"><?php echo $lab["price"]; ?></p>
                  <p class="card-title" style="font-weight:bold;"><?php echo $lab["year_name"]; ?></p>
                  <a class="btn btn-danger"  href="labs.php?id=<?php echo $lab["id"];?>">Add to cart</a>
              </div>
          </div>
    </div>
  <?php } ?>
    </div>
    </table>
  </body>
</html>
