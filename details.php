<?php
  session_start();
  require("inc/connect.php");
  require("inc/functions.php");

  $connect = connectToDB();

$building = $_GET['id'];

$buildingquery = "
  SELECT *
  FROM building
  WHERE buildingID = " . $building . "";

$buildingresource = mysqli_query($connect, $buildingquery);
$row = mysqli_fetch_assoc($buildingresource);

$userquery = "
  SELECT email, firstName, lastName, phone
  FROM user
  WHERE userID = (  SELECT user_ID
                    FROM building
                    WHERE buildingID = " . $building . ")";

$userresource = mysqli_query($connect, $userquery);
$userrow = mysqli_fetch_assoc($userresource);

if ($row['space'] == "Niet bekend") {
  $space = $row['space'];
}
else{
  $space = $row['space'] . " m²"; 
}

if ($row['picture1'] == NULL) 
  {
    $picture1 = "img/noimg.jpg";
    $count = 0;
  }
  else
  {
    if ($row['picture1'] != NULL) {
      $picture1 = $row['picture1'];
      $count = 1;
    }
    if ($row['picture2'] != NULL) {
      $picture2 = $row['picture2'];
      $count = 2;
    }
    if ($row['picture3'] != NULL) {
      $picture3 = $row['picture3'];
      $count = 3;
    }
    if ($row['picture4'] != NULL) {
      $picture4 = $row['picture4'];
      $count = 4;
    }
    if ($row['picture5'] != NULL) {
      $picture5 = $row['picture5'];
      $count = 5;
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Roomers">
  <meta name="author" content="Myrell Richardson">
  <link rel="icon" href="img/logo.png">
  <title>Roomers</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
  <script defer src="lib/fontawesome/everything.min.js"></script>
  <script defer src="lib/fontawesome/fontawesome.min.js"></script>

  <link rel="stylesheet" href="css/main.css">
</head>

<body ondragstart="return false">
  <?php include 'inc/header.php'; ?>
  <section>
    <div class="inner">
      <?php
        for ($x=0; $x < $count; $x++) { 
          if ($x == 0) { ?>
            <img src=<?php echo $picture1 ?> id="detail-img">
            <?php
          }
          else if ($x == 1) { ?>
            <img src=<?php echo $picture2 ?> id="detail-img">
            <?php
          }
          else if ($x == 2) { ?>
            <img src=<?php echo $picture3 ?> id="detail-img">
            <?php
          }
          else if ($x == 3) { ?>
            <img src=<?php echo $picture4 ?> id="detail-img">
            <?php
          }
          else if ($x == 4) { ?>
            <img src=<?php echo $picture5 ?> id="detail-img">
            <?php
          }
        }
      ?>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="lib/main.js"></script>
</body>

</html>