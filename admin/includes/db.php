<?php 

$db['server']="localhost";
$db['username']="root";
$db['password']="";
$db['db_name']="cms";

foreach ($db as $key => $value) {
	define(strtoupper($key) , $value);
}

$con=mysqli_connect(SERVER,USERNAME,PASSWORD,DB_NAME);
if($con){
	echo "connection established";
}
else{
	echo "connection Failed";
}

 ?>