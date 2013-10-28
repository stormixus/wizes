<?php
$addr = trim($city);
$addr = str_replace(' ', '+', $addr);
$fullurl = "http://maps.googleapis.com/maps/api/geocode/json?address=".urldecode($addr)."&sensor=true";
$string .= file_get_contents($fullurl); // get json content
$json_a = json_decode($string, true); //json decoder

$json_lat =  $json_a['results'][0]['geometry']['location']['lat']; // get lat for json
$json_lng = $json_a['results'][0]['geometry']['location']['lng']; // get ing for json
$location = json_encode(array($json_lat,$json_lng));
echo $location;
?>