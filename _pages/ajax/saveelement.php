<?php
if(!defined('__KIMS__')) exit;

checkAdmin(0);

$value = json_decode(stripslashes(urldecode($value)),true);
$d_regis = $d_regis?$d_regis:$date['totime'];
$value['link'] = utf8_urldecode($value['link']);
if($edit=='m') {
	$value = serialize($value);
	$QVAL = "page='$page',value='$value',position='element'";
	getDbUpdate($table['laymeta'],$QVAL,'uid='.$uid);
} else {
	$QKEY = "page,value,d_regis,position";
	$QVAL = "'$page','','$d_regis','element'";
	getDbInsert($table['laymeta'],$QKEY,$QVAL);
	$up_lastuid = getDbCnt($table['laymeta'],'max(uid)','');
	$value['uid'] = $up_lastuid;
	$value = serialize($value);
	$QVAL = "value='$value'";
	getDbUpdate($table['laymeta'],$QVAL,'uid='.$up_lastuid);	
}
?>