<?php
  session_start();

  if (!isset($_SESSION['userID'])) {
    header("Location: index.php");
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
  </head>

  <body>
    <?php  
      include("inc/header.php");
      include("inc/navigation.php")
    ?>
    <div id="mainpage">
      <div id="content-container">
        <img src="img/logo.png" height="200" width="200">
        <h1 id="info-title">Over Ons</h1>
        <div class="infocontainer">
          <p class="abouttitle">Roomers</p>
          <p class="abouttext">
            Roomers is een webapplicatie die functioneert als een platform tussen pandeigenaren en particulieren in Helmond die een ruimte zoeken om te huren.<br>
            Het doel van Roomers is om leegstand in het centrum tegen te gaan door een win-win situatie te creëren voor zowel de pandeigenaren als de huurders. Particulieren die tijdelijk een ruimte nodig hebben om bijvoorbeeld de restanten van hun voorraad te verkopen na een faillissement kunnen met Roomers gemakkelijk een ruimte vinden voor een pop-up store. De eigenaar zit op zijn beurt niet met een leeg pand dat niet gebruikt wordt en verdient geld aan het verhuur. De gemeente heeft hier ook baat bij omdat er op deze manier minder leegstand zal zijn in het centrum en daardoor wordt het straatbeeld toch een stuk mooier. We hopen dat we met Roomers alle partijen een hoop moeite kunnen besparen met betrekking tot contracten, communicatie en betalingen.
          </p>

          <p class="abouttitle">Het Beginstation</p>
          <p class="abouttext">   
            Het Beginstation is een concept dat zich richt op werkgelegenheid, start-ups en innovaties voor een circulaire economie. Een innovatiecentrum gelegen aan het Stationsplein in Helmond welke zorgt voor een inspirerende en verbindende ontmoetingsplaats tussen diverse partijen. Wij verbinden kennis en ervaring met elkaar, faciliteren, stimuleren en motiveren voor een duurzame circulaire economie versneld door de huidige technologie. Wij richten ons op Helmond en Brainport Regio.
            <br><br>
            <a href="http://www.beginstation.nl/" class="infolink">www.beginstation.nl</a>
          </p>

          <p class="abouttitle">Myrell Richardson</p>
          <p class="abouttext">   
            Myrell Richardson is een tweedejaars ICT student aan het ROC Ter AA in Helmond.
          </p>
        </div>
      </div> 
    </div>

    <div id="footer">
      <a href="index.php">Terug naar de hoofdpagina</a>
    </div>
  </body>

  <!-- JQuery and Ajax scripts -->
  <script src="js/index.js"></script>

</html>