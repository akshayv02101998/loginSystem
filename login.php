<?php
$login=false;
$showalert=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials /_dbconnect_.php';
    $username=$_POST["username"];
   $password=$_POST["password"];

    $sql="SELECT * FROM `users1` WHERE  `username`='$username' ";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
      while($row=mysqli_fetch_assoc($result)){
        if(password_verify($password, $row['password'])){
        $login=true;
        SESSION_START();
        $_SESSION['login']=true;
        $_SESSION['username']=$username;
        header("location: welcome.php");
      }else{
        $showalert=true;
    }
    }
}
}
      
        // while($row=mysqli_fetch_assoc($result)){
        //   if(password_verify($password, $row['password'])){
           


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <title>login</title>
</head>
<body>
   <?php
   require 'partials/_nav_.php'?> 
   <?php
if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your are login  .
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
   }
   if($showalert){
       echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
       <strong>Invalid credials!</strong>.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }

   ?>
<div class="container ">
    <h1 class="text-center ">Login to our website</h1>
    <form action="/login system/login.php" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="Password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="Password" required>
        </div>
          <!-- <div id="emailHelp" class="form-text">please check password.</div> -->
        <button type="submit" class="btn btn-primary">Login</button>  
      </form>
   </div>
</body>
</html>