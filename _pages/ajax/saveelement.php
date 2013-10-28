<?php
$value = json_decode(stripslashes(urldecode($value)),true);
$d_regis = $d_regis?$d_regis:$date['totime'];
$value['link'] = utf8_urldecode($value['link']);
$value = serialize($value);
if($edit=='m') {
	$QVAL = "page='$page',value='$value',d_regis='$d_regis',position='element'";
	getDbUpdate($table['laymeta'],$QVAL,'d_regis='.$d_regis);
} else {
	$QKEY = "page,value,d_regis,position";
	$QVAL = "'$page','$value','$d_regis','element'";
	getDbInsert($table['laymeta'],$QKEY,$QVAL);	
}
?>