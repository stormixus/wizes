<?php
#
# 호출할 API URL 빌드
#
$params = array(
	'api_key'	=> 'b8782e93e95a67de98b203b5e2196476',
	'method'	=> 'flickr.photos.search',
	'text'	=> $tag,
	'format'	=> 'php_serial',
	'per_page' => 10,
	'sort' => 'date-posted-asc',
	'content_type' => 1,
	'media' => 'photos',
	'privacy_filter' => 1,
	'geo_context' => 2,
	'page' => 1,
	'tag_mode' => 'all'
);

$encoded_params = array();

foreach ($params as $k => $v){

	$encoded_params[] = urlencode($k).'='.urlencode($v);
}


#
# API 호출 및 응답 디코딩
#

$url = "http://api.flickr.com/services/rest/?".implode('&', $encoded_params);

$rsp = curl_load($url);

$rsp_obj = unserialize($rsp);
$randinte = rand(1,10);
$wback = $rsp_obj['photos']['photo'][$randinte];
$flickrimg = 'http://farm'.$wback['farm'].'.static.flickr.com/'.$wback['server'].'/'.$wback['id'].'_'.$wback['secret'].'.jpg';
echo $flickrimg;
?>