<?php
function ae_send_mail($from, $to, $subject, $text, $headers="")
{
    if (strtolower(substr(PHP_OS, 0, 3)) === 'win')
        $mail_sep = "\r\n";
    else
        $mail_sep = "\n";

    function _rsc($s)
    {
        $s = str_replace("\n", '', $s);
        $s = str_replace("\r", '', $s);
        return $s;
    }

    $h = '';
    if (is_array($headers))
    {
        foreach($headers as $k=>$v)
            $h = _rsc($k).': '._rsc($v).$mail_sep;
        if ($h != '') {
            $h = substr($h, 0, strlen($h) - strlen($mail_sep));
            $h = $mail_sep.$h;
        }
    }

    $from = _rsc($from);
    $to = _rsc($to);
    $subject = _rsc($subject);
    mail($to, $subject, $text, 'From: '.$from.$h);
}
?>

<?php 
//$site_admin = 'nikom2532@gmail.com';
// $site_admin = 'administrator@nikom2532.co.cc';
// $site_admin is receiver e-mail

$site_admin = $email; //from home_member_regis.php

// function ae_send_mail (see code above) is pasted here

if (isset($subject) && isset($text))
    {
		$from = 'i-Ming <administrator@i-ming.co.cc>';
//		$from = 'i-Ming <nikom2532@leftPC.example.com>';
        // nice RFC 2822 From field

		//'from' is sender e-mail

        ae_send_mail($from, $site_admin, $subject, $text,
        array('X-Mailer'=>'PHP script at '.$_SERVER['HTTP_HOST']));
        $mail_send = true;
    }
?>

<?php
/*
insert in body for mail server
==============================================
<body>
<?php
if (isset($mail_send)) {
    echo '<h1>Form has been sent, thank you</h1>';
}
else {
?>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
Your Name: <input type="text" name="from1" size="30" /><br />
Your Email: <input type="text" name="from2" size="30" /><br />
Subject: <input type="text" name="subject" size="30" /><br />
Text: <br />
<textarea rows="5" cols="40" name="text"></textarea>
<input type="submit" value="send" />
</form>
<?php } ?>
</body>
==============================================
*/
?>
