<?php
if (isset($subject) && isset($text))
{
	$from = 'i-Ming <administrator@i-ming.co.cc>';
//	$from = 'i-Ming <nikom2532@localhost>';
//	$from = 'i-ming <nikom2532@hotmail.com>';
//	$from = 'nikom2532@NikomS-ThinkPad-R400';
//	$from = 'nikom2532@leftPC.example.com';
    // nice RFC 2822 From field
	//'from' is sender e-mail

$to = $email; //from home_member_regis.php

//$subject = 'Website Change Reqest';

$headers = "From: ".$from."\r\n";
//$headers .= "Reply-To: ". $from . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n ";
//$headers .= array('X-Mailer'=>'PHP script at '.$_SERVER['HTTP_HOST']);


mail($to, $subject, $text, $headers);
$mail_send = true;
}
?>
