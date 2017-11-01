<?php
	$field_name = $_POST['cf_name'];
	$field_email = $_POST['cf_email'];
	$field_message = $_POST['cf_message'];

	$mail_to = 'myrell-spam@outlook.com';
	$subject = 'Message from Roomers visitor: '.$field_name;

	$body_message = 'From: '.$field_name."\n";
	$body_message .= 'E-mail: '.$field_email."\n";
	$body_message .= 'Message: '.$field_message;

	$headers = 'From: '.$field_email."\r\n";
	$headers .= 'Reply-To: '.$field_email."\r\n";


	$mail_status = mail($mail_to, $subject, $body_message, $headers);

	if ($mail_status) { ?>
		<script language="javascript" type="text/javascript">
			alert('Bedank voor uw bericht. We zullen snel contact met u opnemen.');
			window.location = '../main.php';
		</script>
	<?php
	}
	else { ?>
		<script language="javascript" type="text/javascript">
			alert('Verzenden mislukt. Probeer een mail naar info@beginstation.nl te sturen voor hulp');
			window.location = '../main.php';
		</script>
	<?php
	}
?>