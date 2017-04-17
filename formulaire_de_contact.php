<?php
if (!empty($_POST['message']) && !empty($_POST['mail']) && isset($_POST['sujet'])) {

	if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
		$sMessage = 'Contact : '.$_POST['mail'].'<br /><br />message : <br />'.$_POST['message'];
		
		 $headers = 'From: '.$_POST['mail']. "\r\n" .
					 'Reply-To: '.$_POST['mail']. "\r\n";
		
		mail('monmail@test.fr',$_POST['sujet'], $sMessage, $headers);
		// par securite un log
		file_put_contents(
			'log_mail.txt', 
			$_POST['sujet']."\n\n".
			$sMessage."\n\n".
			$_POST['mail']."\n\n----\n\n", 
			FILE_APPEND
		);
	}
}
