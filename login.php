<?php
//login.php

include("database_connection.php");
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Credentials: true");
if(isset($_COOKIE["type"]))
{
 header("Location: index.php"); 
}

$message = '';

if(isset($_POST["login"]))
{
        $password = strip_tags($_POST['password']);
		$password = md5($password);
 if(empty($_POST["email"]) || empty($_POST["password"]))
 {
  $message = "<div class='alert alert-danger'>Both Fields are required</div>";
 }
 else
 {
  $query = "
  SELECT * FROM korisnici 
  WHERE email = :email
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    'email' => $_POST["email"]
   )
  );
  $count = $statement->rowCount();
  if($count > 0)
  {
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
    if($password == $row["password"])
    {
     setcookie("type", $row["username"], time()+3600);
	 header("Location: index.php"); 
    }
    else
    {
     $message = '<div class="alert alert-danger">Wrong Password</div>';
    }
   }
  }
  else
  {
   $message = "<div class='alert alert-danger'>Wrong Email Address</div>";
  }
 }
}


?>