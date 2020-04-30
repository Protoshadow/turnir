<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Credentials: true");
//logout.php
setcookie("type", "", time()-3600);

?>