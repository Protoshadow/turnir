<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Credentials: true");
include("database_connection.php");
if ( isset( $_GET['user_username']) ) 
{
$username = $_GET['user_username'];
$result = mysqli_query($db, "SELECT username, email, rank, id, groupid, fname, lname FROM korisnici WHERE username = '$username'");
$json_array = array();
while ($row = mysqli_fetch_assoc($result))
{
	$json_array[] = $row;
}
print(json_encode($json_array[0]));
mysqli_close($db);
}
elseif ( isset( $_GET['user_id']) ) 
{
$id = $_GET['user_id'];
$result = mysqli_query($db, "SELECT username, email, rank, id, groupid, fname, lname FROM korisnici WHERE id = '$id'");
$json_array = array();
while ($row = mysqli_fetch_assoc($result))
{
	$json_array[] = $row;
}
print(json_encode($json_array[0]));
mysqli_close($db);
}
elseif ( isset( $_GET['user_showall']) ) 
{
$id = $_GET['user_showall'];
$result = mysqli_query($db, "SELECT username, email, rank, id, groupid, fname, lname FROM korisnici");
$json_array = array();
while ($row = mysqli_fetch_assoc($result))
{
	$json_array[] = $row;
}
print(json_encode($json_array));
mysqli_close($db);
}

elseif(isset($_COOKIE["type"]))
{
	$result = mysqli_query($db, "SELECT username, email, rank, id, groupid, fname, lname FROM korisnici WHERE username = '".$_COOKIE["type"]."'");
	$json_array = array();
	while ($row = mysqli_fetch_assoc($result))
{
		$json_array[] = $row;
}
	print(json_encode($json_array[0]));
}
else{
	http_response_code(401);
	echo "niste ulogovani";
}
?>