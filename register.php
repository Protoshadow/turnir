<?php
//login.php

include("database_connection.php");
header("Access-Control-Allow-Origin: *");
if(isset($_COOKIE["type"]))
{
 header("location:index.php");
}

$message = '';

if(isset($_POST["login"]))
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

<!DOCTYPE html>
<html>
 <head>
  <title>Turnir</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Turnir</h2>
   <br />
   <div class="panel panel-default">

    <div class="panel-heading">Login</div>
    <div class="panel-body">
     <span><?php echo $message; ?></span>
     <form method="post">
      <div class="form-group">
       <label>Username</label>
       <input type="text" name="username" id="username" class="form-control" />
      </div>
      <div class="form-group">
       <label>User Email</label>
       <input type="text" name="email" id="email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Password</label>
       <input type="password" name="password" id="password" class="form-control" />
      </div>
      <div class="form-group">
       <label>First Name</label>
       <input type="text" name="fname" id="fname" class="form-control" />
      </div>
      <div class="form-group">
       <label>Last Name</label>
       <input type="text" name="lname" id="lname" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="login" id="login" class="btn btn-info" value="Login" />
      </div>
     </form>
    </div>
   </div>
   <br />
   <p>email - john_smith@gmail.com</p>
   <p>Password - password</p>
  </div>
 </body>
</html>