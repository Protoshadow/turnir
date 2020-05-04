<?php
//admin.php
include("database_connection.php");
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Credentials: true");
if(isset($_COOKIE["type"]))
{}
if(isset($_POST["delgroup"]))
{
	$query = "SELECT * FROM grupe WHERE id= '".$_POST["groupid"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
  if($count > 0)
  {
	 http_response_code(200);
	$query = "DELETE FROM `grupe` WHERE id ='".$_POST["groupid"]."';
	UPDATE korisnici SET rank = 'user' WHERE groupid= '".$_POST["groupid"]."' AND rank= 'manager';
	UPDATE korisnici SET groupid = '0' WHERE groupid= '".$_POST["groupid"]."';
	";
	$statement = $connect->prepare($query);
	$statement->execute();
  }
  else{
	  http_response_code(404);
	  echo "ne postoji grupa sa tim IDjem";
  }
}
if(isset($_POST["deluser"]))
{
	$query = "SELECT * FROM korisnici WHERE id= '".$_POST["userid"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
  if($count > 0)
  {   
	$result = $statement->fetchAll();
	$crank = "manager";
	$ugroup = "0";
	if($crank == $result[0]["rank"])
	{
	http_response_code(200);
	$query = "DELETE FROM `grupe` WHERE id ='".$result[0]["groupid"]."';
	DELETE FROM `korisnici` WHERE id ='".$_POST["userid"]."';
	UPDATE korisnici SET groupid = '0' WHERE groupid= '".$result[0]["groupid"]."';
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	}
	elseif($ugroup !== $result[0]["groupid"])
	{
	http_response_code(200);
	$query = "UPDATE grupe SET member1 = '' WHERE member1= '".$result[0]["username"]."';
	UPDATE grupe SET member2 = '' WHERE member2= '".$result[0]["username"]."';
	UPDATE grupe SET member3 = '' WHERE member3= '".$result[0]["username"]."';
	UPDATE grupe SET member4 = '' WHERE member4= '".$result[0]["username"]."';
	DELETE FROM `korisnici` WHERE id ='".$_POST["userid"]."';
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	}
	else{
	http_response_code(200);
	$query = "DELETE FROM `korisnici` WHERE id ='".$_POST["userid"]."';
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	}
   }
   	else{
		http_response_code(404);
		echo "user sa tim IDjem ne postoji";
	}
}
if(isset($_POST["meketurnir"]))
{
	http_response_code(200);
	$query = "
	INSERT INTO turnir(name,r1g1,r1g2,r1g3,r1g4,r1g5,r1g6,r1g7,r1g8) VALUES('".$_POST["turnirname"]."','".$_POST["mr1g1"]."','".$_POST["mr1g2"]."','".$_POST["mr1g3"]."','".$_POST["mr1g4"]."',
	'".$_POST["mr1g5"]."','".$_POST["mr1g6"]."','".$_POST["mr1g7"]."','".$_POST["mr1g8"]."');
	";
	$statement = $connect->prepare($query);
	$statement->execute();
}
if(isset($_POST["editturnir"]))
{
	$query = "SELECT * FROM turnir WHERE id= '".$_POST["turnirid"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
  if($count > 0)
  {
	 http_response_code(200);
	$query = "
	UPDATE turnir SET r1g1='".$_POST["r1g1"]."',r1g2='".$_POST["r1g2"]."',r1g3='".$_POST["r1g3"]."',r1g4='".$_POST["r1g4"]."',r1g5='".$_POST["r1g5"]."',
	r1g6='".$_POST["r1g6"]."',r1g7='".$_POST["r1g7"]."',r1g8='".$_POST["r1g8"]."',r2g1='".$_POST["r2g1"]."',r2g2='".$_POST["r2g2"]."',r2g3='".$_POST["r2g3"]."',
	r2g4='".$_POST["r2g4"]."',r3g1='".$_POST["r3g1"]."',r3g2='".$_POST["r3g2"]."',winner='".$_POST["winner"]."' WHERE id='".$_POST["turnirid"]."';
	";
	$statement = $connect->prepare($query);
	$statement->execute();
  }
  else{
	  http_response_code(404);
	  echo "ne pstoji turnir sa tim IDjem";
  }
}
if(isset($_POST["turnirstatus"]))
{
	$query = "SELECT * FROM turnir WHERE id= '".$_POST["statusid"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
  if($count > 0)
  {
	 http_response_code(200);
	$query = "
	UPDATE turnir SET status='".$_POST["status"]."' WHERE id='".$_POST["statusid"]."';
	";
	$statement = $connect->prepare($query);
	$statement->execute();
  }
  else{
	  http_response_code(404);
	  echo "ne pstoji turnir sa tim IDjem";
  }
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Admin</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">
   <h2 align="center">Admin</h2>
   <br />
   <div class="panel panel-default">

    <div class="panel-heading">Delete Group</div>
    <div class="panel-body">
     <form method="post">
	  <div class="form-group">
       <label>Group ID</label>
       <input type="text" name="groupid" id="groupid" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="delgroup" id="delgroup" class="btn btn-info" value="delgroup" />
      </div>
     </form>
    </div>
    <div class="panel-heading">Delete User</div>
    <div class="panel-body">
     <form method="post">
	  <div class="form-group">
       <label>User ID</label>
       <input type="text" name="userid" id="userid" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="deluser" id="deluser" class="btn btn-info" value="deluser" />
      </div>
     </form>
    </div>
    <div class="panel-heading">Make tournament</div>
    <div class="panel-body">
     <form method="post">
	  <div class="form-group">
       <label>Name</label>
       <input type="text" name="turnirname" id="turnirname" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r1g1</label>
       <input type="text" name="mr1g1" id="mr1g1" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r1g2</label>
       <input type="text" name="mr1g2" id="mr1g2" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r1g3</label>
       <input type="text" name="mr1g3" id="mr1g3" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r1g4</label>
       <input type="text" name="mr1g4" id="mr1g4" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r1g5</label>
       <input type="text" name="mr1g5" id="mr1g5" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r1g6</label>
       <input type="text" name="mr1g6" id="mr1g6" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r1g7</label>
       <input type="text" name="mr1g7" id="mr1g7" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r1g8</label>
       <input type="text" name="mr1g8" id="mr1g8" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="meketurnir" id="meketurnir" class="btn btn-info" value="meketurnir" />
      </div>
     </form>
    </div>
    <div class="panel-heading">Edit tournament</div>
    <div class="panel-body">
     <form method="post">
	  <div class="form-group">
       <label>Tournament ID</label>
       <input type="text" name="turnirid" id="turnirid" class="form-control"  required />
      </div>
	  <div class="form-group">
       <label>r1g1</label>
       <input type="text" name="r1g1" id="r1g1" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r1g2</label>
       <input type="text" name="r1g2" id="r1g2" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r1g3</label>
       <input type="text" name="r1g3" id="r1g3" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r1g4</label>
       <input type="text" name="r1g4" id="r1g4" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r1g5</label>
       <input type="text" name="r1g5" id="r1g5" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r1g6</label>
       <input type="text" name="r1g6" id="r1g6" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r1g7</label>
       <input type="text" name="r1g7" id="r1g7" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r1g8</label>
       <input type="text" name="r1g8" id="r1g8" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r2g1</label>
       <input type="text" name="r2g1" id="r2g1" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r2g2</label>
       <input type="text" name="r2g2" id="r2g2" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r2g3</label>
       <input type="text" name="r2g3" id="r2g3" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r2g4</label>
       <input type="text" name="r2g4" id="r2g4" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r3g1</label>
       <input type="text" name="r3g1" id="r3g1" class="form-control" />
      </div>
	  <div class="form-group">
       <label>r3g2</label>
       <input type="text" name="r3g2" id="r3g2" class="form-control" />
      </div>
	  <div class="form-group">
       <label>winner</label>
       <input type="text" name="winner" id="winner" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="editturnir" id="editturnir" class="btn btn-info" value="editturnir" />
      </div>
     </form>
    </div>
    <div class="panel-heading">T status</div>
    <div class="panel-body">
     <form method="post">
	  <div class="form-group">
       <label>ID</label>
       <input type="statusid" name="statusid" id="statusid" class="form-control" />
      </div>
	  <div class="form-group">
       <label>Status</label>
  <select id="status" name="status">
    <option value="running">Running</option>
    <option value="closed">Closed</option>
  </select>
      </div>
      <div class="form-group">
       <input type="submit" name="turnirstatus" id="turnirstatus" class="btn btn-info" value="turnirstatus" />
      </div>
     </form>
    </div>
   </div>
  </div>
 </body>
</html>