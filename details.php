<?php
  session_start();
	require("inc/connect.php");

  if (!isset($_SESSION['userID'])) {
    header("Location: index.php");
  }

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

if ($row['picture'] == NULL) 
  {
    $picture = "img/noimg.jpg";
  }
  else
  {
    $picture = $row['picture']; 
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <meta name="description" content="Roomers">
    <meta name="author" content="Myrell Richardson">
    <link rel="icon" href="img/logo.png">
    <title>Roomers</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome/css/font-awesome.min.css">
  </head>

  <body>
    <?php  
      include("inc/header.php");
      include("inc/navigation.php")
    ?>
    <div id="mainpage">
      <div id="content-container">
        <div id="detail-img-container">
          <img src=<?php echo $picture ?> id="detail-img">
        </div>
        <div id="details-div">
          <div class="details-element">
            <p class="detail-title">Naam</p>
            <p><?php echo $row['name']; ?></p>
          </div>
          <div class="details-element">
            <p class="detail-title">Adres</p>
            <p><?php echo $row['street'] . " " . $row['strnumber'];?></p>
          </div>
          <div class="details-element">
            <p class="detail-title">Postcode</p>
            <p><?php echo $row['areacode']; ?></p>
          </div>
          <div class="details-element">
            <p class="detail-title">Stad</p>
            <p><?php echo $row['city']; ?></p>
          </div>
          <div class="details-element">
            <p class="detail-title">Type gebouw</p>
            <p><?php echo $row['mainfunction']; ?></p>
          </div>
          <div class="details-element">
            <p class="detail-title">Tijd beschikbaar</p>
            <p><?php echo $row['renttime']; ?></p>
          </div>
          <div class="details-element">
            <p class="detail-title">Bouwjaar</p>
            <p><?php echo $row['year']; ?></p>
          </div>
          <div class="details-element">
            <p class="detail-title">Ruimte beschikbaar</p>
            <p><?php echo $row['space'] . " m²"; ?></p>
          </div>
          <div class="details-element">
            <p class="detail-title">Verdiepingen</p>
            <p><?php echo $row['layers']; ?></p>
          </div>
          <div class="details-element">
            <p class="detail-title">Parkeergelegenheid</p>
            <p><?php echo $row['parking']; ?></p>
          </div>
          <div class="details-element">
            <p class="detail-title">Naam eigenaar</p>
            <p><?php echo $userrow['firstName'] . " " . $userrow['lastName']; ?></p>
          </div>
          <!--
          <div class="details-element">
            <p class="detail-title">E-mail</p>
            <p><?php echo $userrow['email']; ?></p>
          </div>
          -->
          <div class="details-element">
            <p class="detail-title">Telefoon</p>
            <p><?php echo $userrow['phone']; ?></p>
          </div>
        </div>
        <div id="details-description">
          <p class="detail-title" id="desc-title">Beschrijving</p>
          <p id="description"><?php echo $row['description']; ?></p>
        </div>
      </div>
  </body>

  <!-- JQuery and Ajax scripts -->
  <script src="js/index.js"></script>
</html>