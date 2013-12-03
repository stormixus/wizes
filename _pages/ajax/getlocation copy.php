<?php
$addr = trim($city);
$addr = str_replace(' ', '+', $addr);
$fullurl = "http://maps.googleapis.com/maps/api/geocode/json?address=".urldecode($addr)."&sensor=true";
$string .= curl_load($fullurl); // get json content
$json_a = json_decode($string, true); //json decoder

$json_lat =  $json_a['results'][0]['geometry']['location']['lat']; // get lat for json
$json_lng = $json_a['results'][0]['geometry']['location']['lng']; // get ing for json
$eowurl = 'http://query.yahooapis.com/v1/public/yql?'.urlencode('q=SELECT * FROM geo.places WHERE text="'.$json_lat.', '.$json_lng.'"&format=json&diagnostics=true&callback=');
$eowjson .= curl_load($eowurl); // get json content
$eowjson = json_decode($eowjson,true);
$eowid = $eowjson['result']['woeid'];
$location = json_encode(array($json_lat,$json_lng,$eowid));
echo $location;
?>