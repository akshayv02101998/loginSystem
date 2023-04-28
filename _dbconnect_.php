<?php
$servername="localhost";
$username="root";
$password="";
$database="users";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("connection not successfully".mysqli_connect_error());
}

?>