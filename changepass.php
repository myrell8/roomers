<?php
  session_start();
	require("inc/connect.php");

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
        <form id="login-form" action="inc/passchange.php" method="POST" onsubmit="return Validate()" name="vform">
          <span class="login-span">Verander wachtwoord</span>
          <div class="form-group">

            <?php 
              if (isset($_SESSION['changefail'])) { ?>
              <span class="incorrect"><?php echo $_SESSION['changefail']; ?></span>
            <?php unset($_SESSION['changefail']); }?>

            <div class="form-input" id="changepassform">
                <span class="form-span">Oud wachtwoord</span>
                <input class="input-class pass" type="password" name="oldpass1">
                <span id="email_error" class="val_error"></span>
            </div>
            <div class="form-input">
                <span class="form-span">Oud wachtwoord opnieuw</span>
                <input class="input-class pass" type="password" name="oldpass2">
                <span id="password_error" class="val_error"></span>
            </div>
            <div class="form-input">
                <span class="form-span">Nieuw wachtwoord</span>
                <input class="input-class pass" type="password" name="newpass">
                <span id="password_error" class="val_error"></span>
            </div>
          </div>
            <input class="login-button" type="submit" name="loginbutton" value="Verander">
            <a href="account.php" class="login-button" id="login-back">Terug</a>
        </form>
      </div> 
    </div>
  </body>

  <!-- JQuery and Ajax scripts -->
  <script src="js/index.js"></script>

</html>