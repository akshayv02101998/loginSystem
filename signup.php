<?php
$showerror=false;
$showalert=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
include 'partials /_dbconnect_.php';
$username=$_POST["username"];
$password=$_POST["password"];
$cpassword=$_POST["cpassword"];
$exits=false;
$sql="SELECT *FROM `users1` WHERE username='$username' ";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
$showalert="Username already exits.";
}else{
if($password==$cpassword ){
  $hash=password_hash($password,  PASSWORD_DEFAULT);
  $sql="INSERT INTO `users1` ( `username`, `password`) VALUES ('$username', '$hash')";
$result=mysqli_query($conn,$sql);
if($result){
 $showerror=true;
}
}else{
  $showalert=" Password do not match";
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <title>signup</title>
</head>
<body>
  
   <?php require 'partials/_nav_.php'?>
   <?php
   if($showerror){
 echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
 <strong>Success!</strong> Your Account has been created and login .
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

   if($showalert){
 echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
 <strong>Error!</strong>'. $showalert .' .
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
   }
?>  
   <div class="container ">
    <h1 class="text-center ">Signup to our website</h1>
    <form action="/login system/signup.php" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="Password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="Password" required>
        </div>
        <div class="mb-1">
            <label for="cpassword" class="form-label">confirm Password</label>
            <input type="password"  class="form-control" name="cpassword" id="cPassword" required>
          </div>
          <div id="emailHelp" class="form-text">please check password.</div>
        <button type="submit" class="btn btn-primary">Signup</button>
      </form>
   </div>
</body>
</html>