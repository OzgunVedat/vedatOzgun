<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$url = 'http://api.geonames.org/countryCodeJSON?lat=' . $_REQUEST['lat'] . '&lng=' . $_REQUEST['lng'] . '&username=vdtozgun&style=full';
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);

$result=curl_exec($ch);

curl_close($ch);

$decode = json_decode($result,true);

$output['status']['code'] = "200";
$output['status']['name'] = "ok";
$output['status']['description'] = "success";
$output['data'] = $decode;


echo json_encode($output);

?>
