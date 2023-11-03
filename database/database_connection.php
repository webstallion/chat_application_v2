<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$con = mysqli_connect($servername, $username, $password, "chat_application") or die('connection failed');
return $con;

	// class Database_connection{
	// 	function connect(){
	// 		$connect=new PDO("mysql:host=localhost; dbname=chat", "root", "");
	// 		return $connect;
	// 	}
	// }
?>