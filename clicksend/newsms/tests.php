<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://sms.manddigitalsolutions.com/sendsmsv2.asp?user=powale&password=pass1234&sender=POWALE&text=sunday&PhoneNumber=917021929384",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 8dae1fa6-48b9-cdbc-eb99-72457f0fe961"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}