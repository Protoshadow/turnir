<?php
header("Access-Control-Allow-Origin: *");
//logout.php
setcookie("type", "", time()-3600);

header("location:login.php");

?>