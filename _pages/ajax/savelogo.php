<?php
if(!defined('__KIMS__')) exit;

checkAdmin(0);

if($d_regis) {
	$QVAL = "page='$page',value='$value',d_regis='$d_regis',position='$position'";
	getDbUpdate($table['laymeta'],$QVAL,'d_regis='.$d_regis);
} else {
	$d_regis = $date['totime'];
	$QKEY = "page,value,d_regis,position";
	$QVAL = "'$page','$value','$d_regis','$position'";
	getDbInsert($table['laymeta'],$QKEY,$QVAL);
}
?>