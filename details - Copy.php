<?php
  session_start();
	require("inc/connect.php");
  require("inc/functions.php");

  // if (!isset($_SESSION['userID'])) {
  //   header("Location: index.php");
  // }

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
  </head>

  <body>
    <div id="mainpage">
      <div id="content-container">
    <div id="detail-img-container">
    <div id="myCarousel" class="carousel" data-ride="carousel" data-interval="false">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <?php for ($i=2; $i <= $count; $i++) { ?>
          <li data-target="#myCarousel" data-slide-to=<?php $i ?>></li>      
        <?php } ?>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src=<?php echo $picture1 ?> id="detail-img">
        </div>

        <?php for ($i=1; $i <= $count; $i++) { ?>
          <?php 
            if ($i == 2){ ?>
              <div class="item">
                <img src=<?php echo $picture2 ?> id="detail-img">
              </div>
          <?php } ?>

          <?php 
            if ($i == 3){ ?>
              <div class="item">
                <img src=<?php echo $picture3 ?> id="detail-img">
              </div>
          <?php } ?>

          <?php 
            if ($i == 4){ ?>
              <div class="item">
                <img src=<?php echo $picture4 ?> id="detail-img">
              </div>
          <?php } ?>

          <?php 
            if ($i == 5){ ?>
              <div class="item">
                <img src=<?php echo $picture5 ?> id="detail-img">
              </div>
          <?php }} ?>
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
        <div id="details-div">
          <div class="details-element">
            <p class="detail-title">Naam</p>
            <p><?php echo e($row['name']); ?></p>
          </div>
          <div class="details-element">
            <p class="detail-title">Adres</p>
            <p><?php echo e($row['street'] . " " . $row['strnumber']);?></p>
          </div>
          <div class="details-element">
            <p class="detail-title">Postcode</p>
            <p><?php echo e($row['areacode']); ?></p>
          </div>
          <div class="details-element">
            <p class="detail-title">Stad</p>
            <p><?php echo e($row['city']); ?></p>
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
            <p><?php echo e($row['year']); ?></p>
          </div>
          <div class="details-element">
            <p class="detail-title">Ruimte beschikbaar</p>
            <p><?php echo e($space); ?></p>
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
            <p><?php echo e($userrow['firstName'] . " " . $userrow['lastName']); ?></p>
          </div>
          <div class="details-element">
            <p class="detail-title">Telefoon</p>
            <p><?php echo e($userrow['phone']); ?></p>
          </div>
        </div>
        <div id="details-description">
          <p class="detail-title" id="desc-title">Omschrijving</p>
          <p id="description"><?php echo e($row['description']); ?></p>
        </div>
        <a href="react.php?id=<?php echo $_GET['id']; ?>" class="reactbutton">Stuur een reactie</a>
      </div>
  </body>

  <!-- JQuery and Ajax scripts -->
  <script src="js/index.js"></script>
</html>