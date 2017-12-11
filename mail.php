<?php
if( isset($_POST['n']) && isset($_POST['e']) && isset($_POST['m']) ){
	$n = $_POST['n'];
	$e = $_POST['e'];
  $p = $_POST['p'];
	$m = nl2br($_POST['m']);
	$to = "jvdm1988@hotmail.com";
	$from = $e;
	$subject = 'Contact Form Message';
	$message = '<b>Naam:</b> '.$n.' <br><b>Email:</b> '.$e.' <br><b>Telefoon:</b> '.$p.' <p>'.$m.'</p>';
	$headers = "From: $from\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	if( mail($to, $subject, $message, $headers) ){
		echo "success";
	} else {
		echo "Er is een fout opgetreden, probeer het later nog eens.";
	}
}
?>
