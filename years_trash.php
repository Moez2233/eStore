<?php
include 'basic.php';
if (isset($_GET["id"])){
  years_delete($_GET["id"],"restore");
}
$data=years_list("deleted"); ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>years Trash - <?php echo $app_name; ?></title>
     <?php include 'style.php'; ?>
   </head>
   <body>
     <?php include 'navbar.php'; ?>
     <div class="container">
         <h1 class="display-1 text-success">years Trash</h1>
         <a class="btn btn-dark mb-5" href="years_new.php">New year</a>
         <table class="table table-dark table-bordered table-striped">
           <tr>
             <td><b>ID</b></td>
             <td><b>Name</b></td>
             <td><b>Actions</b></td>
           </tr>
           <?php while($year=mysqli_fetch_assoc($data)){ ?>
             <tr>

             <td><?php echo $year["id"]; ?></td>
             <td><?php echo $year["name"]; ?></td>
             <td>
               <a class="btn btn-primary" href="years_trash.php?id=<?php echo $year["id"];?>">Restore</a>
               <a class="btn btn-danger" href="years_list.php?id=<?php echo $year["id"];?>">Delete</a>
             </td>
             </tr>
           <?php } ?>
     </table>

   </body>
 </html>
