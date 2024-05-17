<?php
include 'basic.php';
if (isset($_POST["username"])) {
  $user = get_user($_POST["username"]);
  if (isset($user["username"])) {
    if (password_verify($_POST["password"],$user["password"])) {
      $_SESSION["username"]= $user["username"];
      if ($user["admin"]==1) {
        header("location: mobiles_list.php");
      }else{
        header("location: index.php");
      }
    }
    else {
        echo "your typed an Incorrect Password";
    }

  }
  else {
    echo "This Username doesn't exist";
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create An Account - <?php echo $app_name; ?> </title>
    <?php include 'style.php'; ?>
  </head>
  <body>
 <div style="background-color: lavender;">
       <div class="container " >
        <div class="row" style="margin-top:50px;">
            <div class="col-lg-4 col-md-4 col-sm-3 hidden-xs " ></div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
             <div style="border:5px double black;  padding:30px; width:100%; height:100%; ">
              <h1 style="text-align:center; color:darkblue; font-weight:bold;">login to your Account</h1>
                <form  action="sign_in.php" method="post">
                  <div class="form-group mt-3 mb-3 " >
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" style="text-align:left; font-size:20px";" placeholder="PhoneNumber aw E-mail">
                  </div>
                  <div class="form-group mt-3 mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" style="text-align:left; font-size:20px";" placeholder="Password">
                  </div>
                  <div style="text-align:center;">
                  <button type="submit" class="btn btn-primary" >Sign in </button>
                </div>
                  <a href="#">
                            <p style="text-align:center; font-size:large;  margin-top:30px">Forgot your password</p>
                        </a>
                        <p style="text-align:center; font-size:x-large">Aw</p>
                        <h3 style="text-align:center">If you are registered with social media accounts</h3>
                        <a href="https://www.facebook.com/samaa.omar.766/"><span class="fa fa-facebook"
                                style="font-size:25px; margin-left:130px; position:center;"></span></a>
                        <a href="https://www.google.com/?hl=ar"><span class="fa fa-google"
                                style="font-size:25px; margin-left:40px; position:center;"></span></a>
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                </form>
                <p class="mt-5 text-center">Don't Have an account? Try to<a href="sign_up.php">Create One</p>
    </div>
  </div>
</body>
