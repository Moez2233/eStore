<?php
include "basic.php";
if (isset($_GET["id"])) {
  cart($_GET["id"], $_GET["action"]);
}
if (isset($_GET['total'])) {
  $y = $_GET['total'];
  $r = 1;
} else {
  $x = 1;
  $y = 0;
}
$data = cart_list();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>mobile cart</title>
  <?php include 'style.php'; ?>
</head>

<body>
  <?php include 'navbar1.php'; ?>
  <div class="container">
    <div class="row">
      <h1 class="display-1">Cart</h1>
      <table class="table table-bordered table-striped">
        <tr>
          <td>ID</td>
          <td>image</td>
          <td>price</td>
          <td>count</td>
          <td>Actions</td>
        </tr>
        <form action="new.php" method="post">
          <?php while ($agent = mysqli_fetch_assoc($data)) { ?>
            <tr>
              <td><?php echo $agent["id"]; ?></td>
              <td><img src="img/mobiles/<?php echo $agent["image"]; ?>" style="width: 80px;"></td>
              <td><?php echo $agent["price"]; ?></td>
              <td>
                <?php
                if (isset($_GET['total'])) {
                  $i = $agent["id"];
                  $x = $_GET['count' . $i];
                }
                ?>
                <div class="form-group mb-4">
                  <label for="Name">count</label>
                  <input type="text" name="count<?php echo $agent["id"]; ?>" value="<?php echo $x; ?>" class="form-control">
                  <input type="hidden" name="price<?php echo $agent["id"]; ?>" value="<?php echo $agent["price"]; ?>" class="form-control">
                </div>
              <td>

                <a class="btn btn-danger" href="cart_mobile.php?id=<?php echo $agent["id"]; ?>&action=restore">Delete Form cart</a>
              </td>
            </tr>
          <?php } ?>
          <tr>

          </tr>
      </table>
      <a class="btn btn-light btn btn-outline-primary" href="mobiles.php">Back</a>
      <span style="padding: 10px ;"></span>
      <button type="submit" class="btn btn-light btn btn-outline-primary">total price</button>
      </form>
      <span style="padding: 10px ;"></span>
      <div class="form-group mb-4">
        <input style="text-align: center;" readonly name="t" value="<?php echo $y ?>" class="form-control">
      </div>

    </div>
  </div>
</body>

</html>
