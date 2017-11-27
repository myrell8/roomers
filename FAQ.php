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
        <h1 id="info-title">Veelgestelde vragen (FAQ)</h1>
        <div class="infocontainer">
          <div class="FAQ-div">
            <p class="FAQ-title">Wat is Roomers?</p>
            <p class="FAQ-text">Roomers is een webapplicatie die functioneert als een platform tussen pandeigenaren en particulieren in Helmond die een ruimte zoeken om (tijdelijk) te huren. Pandeigenaren die een pand of een ruimte willen verhuren kunnen een account aanmaken en hiermee kunnen ze een of meerdere advertenties plaatsen op de website. Deze advertenties zijn allemaal te vinden in de lijst op de Homepage. Deze lijst kan gefilterd en gesorteerd worden op verschillende criteria. Op deze manier kunnen particulieren die de site bezoeken dus de ideale ruimte vinden en gemakkelijk in contact komen met de eigenaar.</p>
          </div>

          <div class="FAQ-div2">
            <p class="FAQ-title">Wat is het doel van Roomers?</p>
            <p class="FAQ-text">Het doel van Roomers is om leegstand in het centrum tegen te gaan door een win-win situatie te creëren voor zowel de pandeigenaren als de huurders. Particulieren die tijdelijk een ruimte nodig hebben om bijvoorbeeld de restanten van hun voorraad te verkopen na een faillissement kunnen met Roomers gemakkelijk een ruimte vinden voor een pop-up store. De eigenaar zit op zijn beurt niet met een leeg pand dat niet gebruikt wordt en verdient geld aan de verhuur. De gemeente heeft hier ook baat bij omdat er op deze manier minder leegstand zal zijn in het centrum en daardoor wordt het straatbeeld toch een stuk mooier. We hopen dat we met Roomers alle partijen een hoop moeite kunnen besparen met betrekking tot contracten, communicatie en betalingen.</p>
          </div>

          <div class="FAQ-div">
            <p class="FAQ-title">Hoe plaats ik een advertentie?</p>
            <p class="FAQ-text">Klik op "Mijn advertenties" in de navigatiebalk boven in uw scherm. Klik vervolgens op advertentie plaatsen (grote knop). Er zal een formulier verschijnen waarin u de gegevens van uw advertentie in kunt vullen. Aan de linkerkant van het formulier vind u het menu om afbeeldingen aan de advertentie toe te voegen. Druk vervolgens op de "Plaats advertentie" knop.</p>
          </div>

          <div class="FAQ-div2">
            <p class="FAQ-title">Hoe reageer ik op een advertentie?</p>
            <p class="FAQ-text">Klik op de "Meer info" knop die bij de advertentie staat. Nu komt u op de pagina waar alle details van de betreffende advertentie weergeven staan. Scroll naar beneden zodat u op de "Stuur een reactie" knop kunt klikken. U wordt doorverwezen naar een pagina waarop u uw bericht in kunt voeren. Zodra u op de verzend knop drukt zal degene die de advertentie geplaatst heeft een notificatie en een mail ontvangen.</p>
          </div>

          <div class="FAQ-div">
            <p class="FAQ-title">Hoe verwijder of bewerk ik een advertentie?</p>
            <p class="FAQ-text">Klik op "Mijn advertenties" in de navigatiebalk boven in uw scherm. Hier ziet het vak "Mijn advertentie" waarin al uw advertenties weergeven worden. Bij elke advertentie zitten twee knoppen. Een om de advertentie te verwijderen en een om de advertentie te bewerken. Het bewerken van advertenties werkt hetzelfde als plaatsen van advertenties. Het verwijderen van de advertentie moet nog een keer bevestigd worden nadat u op de knop klikt.</p>
          </div>

          <div class="FAQ-div2">
            <p class="FAQ-title">Waar kan ik de filteropties vinden?</p>
            <p class="FAQ-text">Op de hoofdpagina staat in een groot vak "Zoekfilters" op dit vak kunt u klikken om de filteropties te weergeven.</p>
          </div>

          <div class="FAQ-div">
            <p class="FAQ-title">Wie ziet mijn gegevens?</p>
            <p class="FAQ-text">Uw naam en telefoonnummer(mits u dit opgegeven heeft) zullen zichtbaar zijn bij elke advertentie die u plaatst. De rest van uw gegevens zullen voor niemand zichtbaar zijn.</p>
          </div>

          <div class="FAQ-div2">
            <p class="FAQ-title">Hoe verander ik mijn gegevens?</p>
            <p class="FAQ-text">Klik op "Mijn account" in de navigatiebalk boven in uw scherm. Op dit scherm ziet u drie knoppen. Een om uw wachtwoord te veranderen, een om uw accountgegevens te veranderen en een om terug te gaan naar de hoofdpagina.</p>
          </div>
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