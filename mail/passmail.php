<?php
	session_start();
	require("../inc/connect.php");
	$connect = connectToDB();

	$field_email = $_POST['pf_email'];
	$field_name = "Roomers";
	$field_info = "info@beginstation.nl";

	$sql = "
	  SELECT *
	  FROM user
	  WHERE email = '$field_email'";

	$resource = mysqli_query($connect, $sql);
	$row = mysqli_fetch_assoc($resource);

	$field_message = "Log in met uw email en dit wachtwoord: " . $row['salt'] . " om een nieuw wachtwoord in te stellen. \n Heeft u niet om dit wachtwoordherstel gevraagd? Neem dan contact op met info@beginstation.nl";

	$mail_to = $field_email;
	$subject = 'Roomers wachtwoordherstel';

	$body_message = 'From: '.$field_name."\n";
	$body_message .= 'E-mail: '.$field_info."\n";
	$body_message .= 'Message: '.$field_message;

	$headers = 'From: '.$field_info."\r\n";
	$headers .= 'Reply-To: '.$field_info."\r\n";

	$mail_status = mail($mail_to, $subject, $body_message, $headers);

	if ($mail_status) { ?>
		<script language="javascript" type="text/javascript">
			alert('Er is een mail vertuurd naar uw emailadres.');
			window.location = '../main.php';
		</script>
	<?php
	}
	else { ?>
		<script language="javascript" type="text/javascript">
			alert('Emailadres niet gevonden. Probeer het opnieuw of neem contact op met info@beginstion.nl');
			window.location = '../main.php';
		</script>
	<?php
	}
?>