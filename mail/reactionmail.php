<?php
	session_start();
	require("../inc/connect.php");
	$connect = connectToDB();

	$field_name = $_POST['cf_name'];
	$field_email = $_POST['cf_email'];
	$field_message = $_POST['cf_message'];

	$sql = "
		SELECT email 
		FROM user
		WHERE userID = (
							SELECT user_ID
							FROM building
							WHERE buildingID = " . $_POST['cf_buildingID'] . ")";

	$resource = mysqli_query($connect, $sql);
	$row = mysqli_fetch_assoc($resource);

	$mail_to = $row['email'];
	$subject = 'Reactie van Roomers gebruiker: '.$field_name;

	$body_message = 'From: '.$field_name."\n";
	$body_message .= 'E-mail: '.$field_email."\n";
	$body_message .= 'Message: '.$field_message;

	$headers = 'From: '.$field_email."\r\n";
	$headers .= 'Reply-To: '.$field_email."\r\n";


	$mail_status = mail($mail_to, $subject, $body_message, $headers);

	if ($mail_status) { ?>
		<script language="javascript" type="text/javascript">
			alert('Uw reactie is verstuurd.');
			window.location = '../main.php';
		</script>
	<?php
	}
	else { ?>
		<script language="javascript" type="text/javascript">
			alert('Verzenden mislukt. Probeer het opnieuw.');
			window.location = '../main.php';
		</script>
	<?php
	}
?>