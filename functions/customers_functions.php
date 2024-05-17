<?php
 function customers_list($status="active"){
  global $conn;
  if($status=="active"){
    $sql = "SELECT customers.*,cities.name As cityname FROM customers ,cities
    where cities.id = customers.city_id and customers.active =1";
  }
  elseif ($status=="deleted") {
    $sql = "SELECT customers.*,cities.name As cityname FROM customers ,cities
    where cities.id = customers.city_id and customers.active =0";
  }
    $data = mysqli_query($conn,$sql);
    return $data;
  }
  function customers_new($name,$image,$phone,$address,$email,$bdate,$city_id)
{
    global $conn;
    $sql ="INSERT INTO customers (name,image,phone,address,email,bdate,city_id)VALUES('$name','$image','$phone','$address','$email','$bdate','$city_id')";
    mysqli_query($conn,$sql);
    header("location:customers_list.php");
    $sql ="SELECT * FROM cities";
    $cities_list = mysqli_query($conn,$sql);
  }
  function customers_delete($id,$action){
      global $conn;
      //$sql = "DELETE  FROM customers WHERE id='$id'";
      if($action=="deleted"){
        $sql = "UPDATE  customers set active=0 WHERE id='$id'";
        $location = "customers_list.php";
     }
      elseif ($action=="restore") {
        $sql = "UPDATE  customers set active=1 WHERE id='$id'";
        $location = "customers_trash.php";
      }
      elseif ($action == "forever") {
        $sql = "DELETE FROM customers WHERE id='$id'";
        $location = "customers_trash.php";
      }
      mysqli_query($conn,$sql);
      header("Location:$location");
    }
  function customers_edit($id){
      global $conn;
      $sql = "SELECT * FROM customers WHERE id='$id'";
      $data = mysqli_query($conn,$sql);
      $customer=mysqli_fetch_assoc($data);
      $sql= "SELECT * FROM cities";
      $cities_list =mysqli_query($conn,$sql);
      return $customer;
  }
  function customers_update($id,$name,$imagefile,$phone,$address,$email,$bdate,$city_id){
      global $conn;
      if ($imagefile["name"]!="") {
          $tmp_name =$imagefile["tmp_name"];
          $location ="img/customers/";
          $filename=strtolower($name);
          $filename=str_replace(" ","-",$filename);
          $filename=$filename."-logo.png";

          move_uploaded_file($tmp_name,$location.$filename);
      $sql ="UPDATE customers SET name='$name',image='$filename' ,phone='$phone',address='$address',email='$email',
      bdate='$bdate',city_id='$city_id',image='$filename' WHERE id='$id'";
    }
    else {
      $sql ="UPDATE customers SET name='$name',phone='$phone',address='$address',email='$email',
      bdate='$bdate',city_id='$city_id' WHERE id='$id'";
    }
      mysqli_query($conn,$sql);
      header("Location:customers_list.php");
  }

  ?>
