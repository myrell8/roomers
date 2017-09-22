<?php
	session_start();
	include 'connect.php';
	$connect = connectToDB();

	$user = $_SESSION['userID'];
	$name = $_POST['addname'];
	$street = $_POST['street'];
	$strnumber = $_POST['number'];
	$area = $_POST['areacode'];
	$city = $_POST['city'];
	$type = $_POST['type'];
	$time = $_POST['time'];
	$year = $_POST['year'];
	$space =  $_POST['space'];
	$layers = $_POST['layers'];
	$parking = $_POST['parking'];
	$desc = $_POST['description'];

	$sql = "INSERT INTO building(buildingID,user_ID,name,picture,street,strnumber,areacode,city,mainfunction,renttime,year,space,layers,parking,description) VALUES('','$user','$name','','$street','$strnumber','$area','$city','$type','$time','$year','$space','$layers','$parking', '$desc')";

	mysqli_query($connect, $sql);
	header("Location: ../main.php");
	
?>