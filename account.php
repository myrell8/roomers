<?php
  session_start();
	require("inc/connect.php");

  if (!isset($_SESSION['userID'])) {
    header("Location: index.php");
  }

  $connect = connectToDB();

  $userquery = "
    SELECT *
    FROM user
    WHERE userID = " . $_SESSION['userID'] . "
    ";

  $userresource = mysqli_query($connect, $userquery);

  $UserArray = array();
    while($result = mysqli_fetch_assoc($userresource))
    {
      $UserArray[] = $result;
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
        <img src="img/logo.png" height="400" width="400">
        <div class="accounttable">
          <div class="account-left">
            <p>Email:</p>
            <p>Voornaam:</p>
            <p>Achternaam:</p>
            <p>Telefoonnummer:</p>
          </div>
          <div class="account-right">
            <?php foreach ($UserArray as $user){ ?>
              <p><?php echo $user['email']; ?></p>
              <p><?php echo $user['firstName']; ?></p>
              <p><?php echo $user['lastName']; ?></p>
              <p><?php echo $user['phone']; ?></p>
            <?php } ?>
          </div>
        </div>
        <div id="account-container-buttons">
          <a href="changepass.php" class="account-button">Wachtwoord veranderen</a>
          <a href="accountinfo.php" class="account-button">Gegevens aanpassen</a>
          <a href="main.php" class="account-button">Terug</a>
        </div>
      </div> 
    </div>
  </body>

  <!-- JQuery and Ajax scripts -->
  <script src="js/index.js"></script>

</html>