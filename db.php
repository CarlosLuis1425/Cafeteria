<?php  
function conectar($value='')
{
	$host = "localhost";
	$user = "root";
	$pass = '';
	$db = 'cafeteria';

	$conn = mysqli_connect($host, $user, $pass, $db);

	return $conn;
}




?>