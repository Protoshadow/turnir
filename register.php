<?php
//login.php

include("database_connection.php");
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Credentials: true");
if(isset($_COOKIE["type"]))
{
 //cookie provera
}

$message = '';

if(isset($_POST["register"]))
{
 $username = strip_tags($_POST['username']);
 $email = strip_tags($_POST['email']);
 $fname = strip_tags($_POST['fname']);
 $lname = strip_tags($_POST['lname']);
 $password = strip_tags($_POST['password']);
 $password = md5($password);
 if(empty($_POST["email"]) || empty($_POST["password"]))
 {
  $message = "<div class='alert alert-danger'>Both Fields are required</div>";
 }
 else
 {
  $query = "
  INSERT INTO korisnici(username,password,email,fname,lname) VALUES('$username','$password','$email','$fname','$lname')
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
   }
  }



  ?>
