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
        <h1 id="info-title">Contact</h1>
        <div class="infocontainer">
          <form id="contact-form" action="mail/supportmail.php" method="POST" enctype="multipart/form-data">
            <div id="contact-top">
              <div>
                <span>Naam: </span>
                <input type="text" name="cf_name" value="<?php echo $_SESSION['username'] ?>" required>
              </div>
              <div>
                <span>Email: </span>
                <input type="text" name="cf_email" value="<?php echo $_SESSION['email'] ?>" required>
              </div>
            </div>
            <div id="contact-bot">
              <p>Bericht:</p>
              <textarea name="cf_message" rows="10" required></textarea>
              <input type="submit" name="submit" id="contact-button" value="Verzend">
            </div>
          </form>
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