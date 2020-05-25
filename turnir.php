<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Credentials: true");
include("database_connection.php");
if ( isset( $_GET['turnir_id']) ) 
{
$id = $_GET['turnir_id'];
$result = mysqli_query($db, "SELECT * FROM turnir WHERE id = '$id'");
$row_cnt = $result->num_rows;
if($row_cnt > 0)
	{
	$json_array = array();
	while ($row = mysqli_fetch_assoc($result))
	{
		$json_array[] = $row;
	}
	print(json_encode($json_array[0]));
	mysqli_close($db);
	}
else{
	http_response_code(401);
}
}
elseif ( isset( $_GET['turnir_showall'])) 
{
$id = $_GET['turnir_showall'];
$result = mysqli_query($db, "SELECT * FROM turnir");
$json_array = array();
while ($row = mysqli_fetch_assoc($result))
{
	$json_array[] = $row;
}
print(json_encode($json_array));
mysqli_close($db);
}
elseif ( isset( $_GET['current_user'])) 
{
	$query = "SELECT * FROM korisnici WHERE username ='".$_COOKIE["type"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
  if($count > 0)
  {
	$result = $statement->fetchAll();
	$query = mysqli_query($db, "SELECT * FROM turnir WHERE r1g1 = '".$result[0]["groupid"]."' OR r1g2 = '".$result[0]["groupid"]."' OR r1g3 = '".$result[0]["groupid"]."' OR 
	r1g4 = '".$result[0]["groupid"]."' OR r1g5 = '".$result[0]["groupid"]."' OR r1g6 = '".$result[0]["groupid"]."' OR r1g7 = '".$result[0]["groupid"]."' OR r1g8 = '".$result[0]["groupid"]."'");
	$json_array = array();
while ($row = mysqli_fetch_assoc($query))
{
	$json_array[] = $row;
}
print(json_encode($json_array));
mysqli_close($db);
}
else{
	http_response_code(401);
}
}
else{
	http_response_code(401);
}
?>