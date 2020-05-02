<?php
//index.php
include("database_connection.php");
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Credentials: true");
if(isset($_COOKIE["type"]))
{

if(isset($_POST["makegroup"]))
{
	$query = "SELECT * FROM grupe WHERE menager= '".$_COOKIE["type"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
  if($count > 0)
  {
	  http_response_code(401);
	  echo "Vec ste menager jedne grupe";
  }
  else{
	http_response_code(200);
	$query = "
  INSERT INTO grupe(menager, groupname) VALUES('".$_COOKIE["type"]."', '".$_POST["groupname"]."')
  ";
	$statement = $connect->prepare($query);
	$statement->execute();
	$query2 = "UPDATE korisnici SET rank = 'manager' WHERE username = '".$_COOKIE["type"]."'";
	$statement = $connect->prepare($query2);
	$statement->execute();
  }
}
if(isset($_POST["delgroup"]))
{
	$query = "SELECT * FROM grupe WHERE menager= '".$_COOKIE["type"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
  if($count > 0)
  {
	http_response_code(200);
	$query = "
  DELETE FROM `grupe` WHERE menager ='".$_COOKIE["type"]."'
  ";
	$statement = $connect->prepare($query);
	$statement->execute();
	$query2 = "UPDATE korisnici SET rank = 'user' WHERE username = '".$_COOKIE["type"]."'";
	$statement = $connect->prepare($query2);
	$statement->execute();
  }
  else{
	http_response_code(401);
	echo "Niste menager ni jedne grupe";
  }
}
if(isset($_POST["editgroup"]))
{
	http_response_code(200);
	$query = "UPDATE grupe SET member1 = '".$_POST["member1"]."', member2 = '".$_POST["member2"]."', member3 = '".$_POST["member3"]."', member4 = '".$_POST["member4"]."' WHERE menager = '".$_COOKIE["type"]."' ";
	$statement = $connect->prepare($query);
	$statement->execute();
}
if(isset($_POST["leavegroup"]))
{
	$membername=$_COOKIE['type'];
	$query = "SELECT * FROM grupe WHERE member1= '".$_COOKIE["type"]."'  OR member2= '".$_COOKIE["type"]."'  OR member3= '".$_COOKIE["type"]."'  OR member4= '".$_COOKIE["type"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
  if($count > 0)
  {
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
    if($membername == $row["member1"])
    {
	http_response_code(200);
	$query = "UPDATE grupe SET member1 = ''";
	$statement = $connect->prepare($query);
	$statement->execute();
    }
    elseif ($membername == $row["member2"])
    {
	http_response_code(200);
	$query = "UPDATE grupe SET member2 = ''";
	$statement = $connect->prepare($query);
	$statement->execute();
    }
    elseif ($membername == $row["member3"])
    {
	http_response_code(200);
	$query = "UPDATE grupe SET member3 = ''";
	$statement = $connect->prepare($query);
	$statement->execute();
    }
    elseif ($membername == $row["member4"])
    {
	http_response_code(200);
	$query = "UPDATE grupe SET member4 = ''";
	$statement = $connect->prepare($query);
	$statement->execute();
    }
  }
  }
  else{
	  http_response_code(401);
	  echo "niste clan ni jedne grupe";
  }
}

if(isset($_POST["joingroup"]))
{
	$empty="";
	$query = "SELECT * FROM grupe WHERE id= '".$_POST["joincode"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
  if($count > 0)
  {
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
    if($empty == $row["member1"])
    {
	http_response_code(200);
	$query = "UPDATE grupe SET member1 = '".$_COOKIE["type"]."' WHERE id= '".$_POST["joincode"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
    }
    elseif ($empty == $row["member2"])
    {
	http_response_code(200);
	$query = "UPDATE grupe SET member2 = '".$_COOKIE["type"]."' WHERE id= '".$_POST["joincode"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
    }
    elseif ($empty == $row["member3"])
    {
	http_response_code(200);
	$query = "UPDATE grupe SET member3 = '".$_COOKIE["type"]."' WHERE id= '".$_POST["joincode"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
    }
    elseif ($empty == $row["member4"])
    {
	http_response_code(200);
	$query = "UPDATE grupe SET member4 = '".$_COOKIE["type"]."' WHERE id= '".$_POST["joincode"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
    }
	else{
	http_response_code(401);
	echo "grupa je puna";
	}
  }
  }
  else{
	  http_response_code(401);
	  echo "Ne postoji taj invite code";
  }
}
}
else{
	echo "niste ulogovani";
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
   <div align="right">
    <a href="logout.php">Logout</a>
   </div>
   <br />
   <?php
   if(isset($_COOKIE["type"]))
   {
    echo '<h2 align="center">Welcome User</h2>';
   }
   ?>
  </div>
   <br />
  <div class="container">
   <h2 align="center">cupa</h2>
   <br />
   <div class="panel panel-default">

    <div class="panel-heading">Make Group</div>
    <div class="panel-body">
     <form method="post">
	  <div class="form-group">
       <label>Group Name</label>
       <input type="text" name="groupname" id="groupname" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="makegroup" id="makegroup" class="btn btn-info" value="makegroup" />
      </div>
     </form>
    </div>
	
    <div class="panel-heading">Delete group</div>
    <div class="panel-body">
     <form method="post">
      <div class="form-group">
       <input type="submit" name="delgroup" id="delgroup" class="btn btn-info" value="delgroup" />
      </div>
     </form>
    </div>

    <div class="panel-heading">Edit group</div>
    <div class="panel-body">
     <form method="post">
	  <div class="form-group">
       <label>Clan 1</label>
       <input type="text" name="member1" id="member1" class="form-control" />
      </div>
	  <div class="form-group">
       <label>Clan 2</label>
       <input type="text" name="member2" id="member2" class="form-control" />
      </div>
	  <div class="form-group">
       <label>Clan 3</label>
       <input type="text" name="member3" id="member3" class="form-control" />
      </div>
	  <div class="form-group">
       <label>Clan 4</label>
       <input type="text" name="member4" id="member4" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="editgroup" id="editgroup" class="btn btn-info" value="editgroup" />
      </div>
     </form>
    </div>
	
    <div class="panel-heading">Leave group</div>
    <div class="panel-body">
     <form method="post">
      <div class="form-group">
       <input type="submit" name="leavegroup" id="leavegroup" class="btn btn-info" value="leavegroup" />
      </div>
     </form>
    </div>

    <div class="panel-heading">Join group</div>
    <div class="panel-body">
     <form method="post">
	  <div class="form-group">
       <label>Code</label>
       <input type="text" name="joincode" id="joincode" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="joingroup" id="joingroup" class="btn btn-info" value="joingroup" />
      </div>
     </form>
    </div>
   </div>
   <br />
  </div>
 </body>
</html>