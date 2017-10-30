<?php
  session_start();
	require("connect.php");

  $connect = connectToDB();

  $building = $_GET['id'];

  $buildingquery = "
    SELECT *
    FROM building
    WHERE buildingID = " . $building . "";

  $buildingresource = mysqli_query($connect, $buildingquery);
  $row = mysqli_fetch_assoc($buildingresource);

  $_SESSION['message'] = $row['name'] . " verwijderd";

  $picture1 = "../" . $row['picture1'];
  $picture2 = "../" . $row['picture2'];
  $picture3 = "../" . $row['picture3'];
  $picture4 = "../" . $row['picture4'];
  $picture5 = "../" . $row['picture5'];

  unlink($picture1);
  unlink($picture2);
  unlink($picture3);
  unlink($picture4);
  unlink($picture5);

  $buildingquery = "
  DELETE 
  FROM building 
  WHERE buildingID = " . $building . " LIMIT 1";

  mysqli_query($connect, $buildingquery);
  header("Location:../createadd.php");
?>