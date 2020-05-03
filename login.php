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

if(isset($_POST["login"]))
{
        $password = strip_tags($_POST['password']);
		$password = md5($password);
 if(empty($_POST["email"]) || empty($_POST["password"]))
 {
  http_response_code(400); // nisu oba polja uneta
  echo "Morate uneti podatke u oba polja.";
 }
 else
 {
	http_response_code(200); //uspesno
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
     setcookie("type", $row["username"], time()+86400);
    }
    else
    {
     http_response_code(400); //losa sifra
	 echo "Sifra nije tacno uneta.";
    }
   }
  }
  else
  {
   http_response_code(400); //los email
   echo "Email nije tacno unet.";
  }
 }
}


?>