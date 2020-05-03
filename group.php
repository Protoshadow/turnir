<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Credentials: true");
include("database_connection.php");
$id = $_GET['group_id'];

$result = mysqli_query($db, "SELECT * FROM grupe WHERE id = $id");
$json_array = array();
while ($row = mysqli_fetch_assoc($result))
{
	$json_array[] = $row;
}
print(json_encode($json_array[0]));
mysqli_close($db);
?>