<?php
//user.php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Credentials: true");
include("database_connection.php");
if(isset($_COOKIE["type"]))
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
}
?>