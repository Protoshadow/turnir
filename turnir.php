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
elseif ( isset( $_GET['turnir_showall']) ) 
{
$id = $_GET['turnir_showall'];
$result = mysqli_query($db, "SELECT username, email, rank, id, groupid, fname, lname FROM korisnici");
$json_array = array();
while ($row = mysqli_fetch_assoc($result))
{
	$json_array[] = $row;
}
print(json_encode($json_array));
mysqli_close($db);
}
else{
	http_response_code(401);
}
?>