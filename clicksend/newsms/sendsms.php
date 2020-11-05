<?php

$number = htmlspecialchars($_GET[number]);

$messageBeta = htmlspecialchars($_GET[message]);
$messageFinal = str_replace(' ', '+', $messageBeta);

$username = 'powale';
$password = 'powale';
$sender = 'POWALE';

$url = "http://sms.manddigitalsolutions.com/sendsmsv2.asp?";
$query ="user=$username&password=$password&sender=$sender&text=$messageFinal&PhoneNumber=$number&track=1";

$api = $url.$query;

$urloutput=file_get_contents($api);
echo $urloutput;

?>
