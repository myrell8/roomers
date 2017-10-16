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

if ($row['picture1'] == NULL) 
  {
    $picture1 = "img/noimg.jpg";
  }
  else
  {
    if (isset($row['picture1'])) {
      $picture1 = $row['picture1'];
      $count = 1;
    }
    if (isset($row['picture2'])) {
      $picture2 = $row['picture2'];
      $count = 2;
    }
    if (isset($row['picture3'])) {
      $picture3 = $row['picture3'];
      $count = 3;
    }
    if (isset($row['picture4'])) {
      $picture4 = $row['picture4'];
      $count = 4;
    }
    if (isset($row['picture5'])) {
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <div id="myCarousel" class="carousel" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <?php for ($i=1; $i < $count; $i++) { ?>
          <li data-target="#myCarousel" data-slide-to="1"></li>      
        <?php } ?>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src=<?php echo $picture1 ?> id="detail-img">
        </div>

        <div class="item">
          <img src=<?php echo $picture2 ?> id="detail-img">
        </div>
      
        <div class="item">
          <img src=<?php echo $picture3 ?> id="detail-img">
        </div>

        <div class="item">
          <img src=<?php echo $picture4 ?> id="detail-img">
        </div>

        <div class="item">
          <img src=<?php echo $picture5 ?> id="detail-img">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>

        <!-- <div id="detail-img-container">
          <img src=<?php echo $picture1 ?> id="detail-img">
          <img src=<?php echo $picture2 ?> id="detail-img">
          <img src=<?php echo $picture3 ?> id="detail-img">
          <img src=<?php echo $picture4 ?> id="detail-img">
          <img src=<?php echo $picture5 ?> id="detail-img">
        </div> -->
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