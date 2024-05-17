<?php
 function employees_list($status="active"){
  global $conn;
  if($status=="active"){
    $sql = "SELECT employees.*,departments.name AS department_name
    FROM employees,departments
    WHERE departments.id=employees.department_id and employees.active =1";
  }
  elseif ($status=="deleted") {
    $sql = "SELECT employees.*,departments.name AS department_name
    FROM employees,departments
    WHERE departments.id=employees.department_id and employees.active =0";
  }
    $data = mysqli_query($conn,$sql);
    return $data;
  }
function employees_new($image,$name,$phone,$address,$email,$department_id,$basic_salary){
    global $conn;
    $sql ="INSERT INTO employees (image,name,phone,address,email,department_id,basic_salary)
    VALUES('$image','$name','$phone','$address','$email','$department_id','$basic_salary')";
    mysqli_query($conn,$sql);
    header("location:employee_list.php");
  }
function employees_delete($id,$action){
    global $conn;
    //$sql = "DELETE  FROM brands WHERE id='$id'";
    if($action=="deleted"){
      $sql = "UPDATE  employees set active=0 WHERE id='$id'";
      $location = "employee_list.php";
   }
    elseif ($action=="restore") {
      $sql = "UPDATE  employees set active=1 WHERE id='$id'";
      $location = "employee_trash.php";
    }
    elseif ($action == "forever") {
      $sql = "DELETE FROM employees WHERE id='$id'";
      $location = "employee_trash.php";
    }
    mysqli_query($conn,$sql);
    header("Location:$location");
  }
function employees_edit($id){
    global $conn;
    $sql="SELECT * FROM employees WHERE id='$id'";
    $data = mysqli_query($conn,$sql);
    $employee=mysqli_fetch_assoc($data);
    return $employee;
}
function employees_update($id,$name,$imagefile,$phone,$address,$email,$department_id,$basic_salary){
    global $conn;
    if ($imagefile["name"]!="") {
        $tmp_name =$imagefile["tmp_name"];
        $location ="img/employees/";
        $filename=strtolower($name);
        $filename=str_replace(" ","-",$filename);
        $filename=$filename."-logo.png";

        move_uploaded_file($tmp_name,$location.$filename);
    $sql ="UPDATE employees SET image='$filename',name='$name',phone='$phone',address='$address'
    ,email='$email',department_id='$department_id',basic_salary='$basic_salary'WHERE id='$id'";
  }
  else {
    $sql ="UPDATE employees SET name='$name',phone='$phone',address='$address'
    ,email='$email',department_id='$department_id',basic_salary='$basic_salary'WHERE id='$id'";
  }
    mysqli_query($conn,$sql);
    header("Location:employee_list.php");
}

?>
