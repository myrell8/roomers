<?php

function connectToDB()
{
	 $servername 	= "localhost";
	 $username 		= "root";
	 $password 		= "";
	 $db 			= "roomers";

	$conn = mysqli_connect($servername, $username,  $password, $db);

	return $conn;
}

?>