<?php	session_start();
include 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST) && empty($_FILES) && $_SERVER['CONTENT_LENGTH'] > 0)
{ 
	die("error");
}

if (isset($_POST['submit'])) {
	$connect = connectToDB();
	$user = $_SESSION['userID'];
	$name = mysql_real_escape_string($_POST['addname']);
	$street = $_POST['street'];
	$strnumber = $_POST['number'];
	$area = $_POST['areacode'];
	$city = mysql_real_escape_string($_POST['city']);
	$type = $_POST['type'];
	$time = $_POST['time'];
	$year = $_POST['year'];
	$space =  $_POST['space'];
	$layers = $_POST['layers'];
	$parking = $_POST['parking'];
	$desc = mysql_real_escape_string($_POST['description']);

	$allowed = array('jpg','jpeg','png');
	$ext = end(explode('.', $_FILES['photo']['name']));

	if (in_array($ext, $allowed)) 
	{
	
		if ($_FILES['photo']['size'] < 15242880) {
			$namepot = md5(rand()).'.'.$ext;
			$sqlpath = "img/".$namepot;
			$path = "../img/".$namepot;
			$result = move_uploaded_file($_FILES['photo']['tmp_name'], $path);
			$sql = "INSERT INTO building(buildingID,user_ID,name,picture,street,strnumber,areacode,city,mainfunction,renttime,year,space,layers,parking,description) VALUES('','$user','$name','$sqlpath','$street','$strnumber','$area','$city','$type','$time','$year','$space','$layers','$parking','$desc')";
			mysqli_query($connect, $sql);
			header("Location: ../main.php");
		} 
		else 
		{
        	$_SESSION['message'] = "Probleem bij het toevoegen van de advertentie, probeer opnieuw.";
        	header("Location: ../main.php");
		}
	}
	else
	{
		$sql = "INSERT INTO building(buildingID,user_ID,name,picture,street,strnumber,areacode,city,mainfunction,renttime,year,space,layers,parking,description) VALUES('','$user','$name','','$street','$strnumber','$area','$city','$type','$time','$year','$space','$layers','$parking','$desc')";
			mysqli_query($connect, $sql);
			header("Location: ../main.php");
	}	
}
else
{
	$_SESSION['message'] = "Probleem bij het toevoegen van de advertentie, probeer opnieuw.";
    header("Location: ../main.php");
}
?>