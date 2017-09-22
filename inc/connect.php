<?php

function connectToDB()
{
	 $servername 	= "localhost";
	 $username 		= "root";
	 $password 		= "usbw";
	 $db 			= "roomers";

	$conn = mysqli_connect($servername, $username,  $password, $db);

	return $conn;
}

?>