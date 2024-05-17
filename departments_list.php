<?php
include 'basic.php';
 if (isset($_GET["id"])){
   departments_delete($_GET["id"],"deleted");
 }
$data=departments_list();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Departments List - <?php echo $app_name; ?></title>
     <?php include 'style.php'; ?>
   </head>
   <body>
     <?php include 'navbar.php'; ?>
     <div class="container">
         <h1 class="display-1 text-danger">Departments List</h1>
         <a class="btn btn-dark mb-4 " href="departments_new.php">New department</a>
         <table class="table table-dark table-bordered table-striped">
       <tr>
         <td><b>ID</b></td>
         <td><b>Name</b></td>
         <td><b>Actions</b></td>
       </tr>
       <?php while($department=mysqli_fetch_assoc($data)){ ?>
         <tr>
           <td><?php echo $department["id"] ?></td>
           <td><?php echo $department["name"] ?></td>
           <td>
             <a class="btn btn-primary" href="departments_edit.php?id=<?php echo $department["id"];?>">Edit</a>
             <a class="btn btn-danger" href="departments_list.php?id=<?php echo $department["id"];?>">Delete</a>
           </td>
         </tr>
      <?php } ?>
     </table>
   </body>
 </html>
