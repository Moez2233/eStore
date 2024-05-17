<?php
include 'basic.php';
if (isset($_POST["name"])) {
  $name =$_FILES["image"]["tmp_name"];
  $location ="img/employees/";
  $filename=strtolower($_POST["name"]);
  $filename=str_replace(" ","-",$filename);
  $filename=$filename."-logo.png";
  move_uploaded_file($name,$location.$filename);
 employees_new($filename,$_POST["name"],$_POST["phone"],
  $_POST["address"] , $_POST["email"] , $_POST["department_id"],$_POST["basic_salary"]);
}
$departments_list=departments_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New employee - <?php echo $app_name;?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container" style="width:700px";>
      <div class="row"style="margin-top:50px";>
    <h1 class="display-1">New employee</h1>
    <form action="employee_new.php" method="post" enctype="multipart/form-data" style="border:3px solid#f1f1f1";>
          <div class="form-group mb-4" >
           <label for="image">Image</label>
           <input type="file" name="image" class="form-control"><br><br>
            <div class="form-group mb-4">
            <label >Name</label>
            <input type="text" name="name"class="form-control"><br><br>
            <div class="form-group mb-4">
            <label >Phone</label>
            <input type="text" name="phone"class="form-control"><br><br>
            <div class="form-group">
            <label >Address</label>
            <input type="text" name="address"class="form-control"><br><br>
            <div class="form-group mb-4">
            <label >Email</label>
            <input type="email" name="email"class="form-control"><br><br>
            <div class="form-group mb-4">
            <label >Department</label>
            <select class="form-control" name="department_id">
              <?php while ($department=mysqli_fetch_assoc($departments_list)) {?>
              <option value="<?php echo $department["id"]; ?>"><?php echo $department["name"]; ?></option>
              <?php } ?>

            </select>
            <div class="form-group mb-4">
            <label >Basic Salary</label>
            <input type="text" name="basic_salary"class="form-control"><br><br>
            <button type="submit" name="button" class="btn btn-dark">Save</button>
            <a href="#"  class="btn btn-secondary">Back</a>
        </div>
        </div>
    </form>
  </body>
</html>
