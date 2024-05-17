<?php
include 'basic.php';
if (isset($_GET["id"])){
  cities_delete($_GET["id"], $_GET["action"]);
}
$data=cities_list("deleted");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cities Trash - <?php echo $app_name; ?> </title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php';?>
    <div class="container">
        <h1 class="display-1">Cities Trash</h1>
        <a class="btn btn-dark mt-5 mb-5" href="cities_new.php">New City</a>
        <table class="table table-dark table-bordered table-striped"
          <tr>
          <td><b>Name</b></td>
          <td><b>Shippin Delivery</b></td>
          <td><b>Actions</b></td>
          </tr>
      </div>

<?php while ($city=mysqli_fetch_assoc($data)) {?>
      <tr>
        <td><?php echo $city["name"]; ?></td>
        <td><?php echo $city["shippindelivery"]; ?></td>
        <td>
          <a class="btn btn-primary" href="cities_trash.php?id=<?php echo $city["id"];?>&action=restore">Restore</a>
          <a class="btn btn-danger" href="cities_trash.php?id=<?php echo $city["id"];?>&action=forever">Delete Forever</a>
        </td>
      </tr>
<?php } ?>

    </table>
  </body>
</html>
