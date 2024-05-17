<?php
include 'basic.php';
function plus($price, $count)
{
  $y = $price * $count;
  return $y;
}
$x = 1;
$y = 0;
$z="";
  $total = cart_list();

  while ($a = mysqli_fetch_assoc($total)) {
    $i = $a['id'];
    $price= $_POST["price$i"];
    $count= $_POST["count$i"];
    $y += plus($price, $count);
    $z ="&count$i=$count".$z;
  }
  header("Location:cart_mobile.php?total=$y$z");
