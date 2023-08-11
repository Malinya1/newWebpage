<?php

require 'connect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="insert into  `registration` (username,password) values('$username','$password')";
    $result=mysqli_query($conn);
    if($result){
        echo "Data inserted successfully";
        }else{
            die(mysqli_error($conn));
        }
}


?>







<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sihnup page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <style>
    body{
    background-color:green;
  }
  </style>
  </head>
  <body>
   <h1 class="text-center">Sign up  </h1>
    <div class="container mt-5">
    <form action="sign.php" method="post">
  
    
    <div class="form-group">
      <label for="exampleInputEmail1" >Name</label>
      <input type="text"  class="form-control" placeholder="Enter your username" name="username">
    </div><br>
    <div class="form-group">
      <label for="exampleInputPassword1" >Password</label>
      <input type="password"  class="form-control" placeholder="Enter your password" name="password">
    </div>
    <br>
   
    <button type="submit" class="btn btn-primary">Submit</button>

</form>


</body>
</html>