<?php
if(!defined('__KIMS__')) exit;

checkAdmin(0);

$indexkey = array('bbsid','type','number');
$val = array($bbsid,$type,$number);
$value['bbsid'] = $bbsid;
$value['type'] = $type;
$value['number'] = $number;
$value = serialize($value);
if($d_regis) {
	$QVAL = "page='$page',value='$value',d_regis='$d_regis',position='$position'";
	getDbUpdate($table['laymeta'],$QVAL,'uid='.$uid);
} else {
	$d_regis = $date['totime'];
	$QKEY = "page,value,d_regis,position";
	$QVAL = "'$page','$value','$d_regis','$position'";
	getDbInsert($table['laymeta'],$QKEY,$QVAL);
	$tablename      = $table['laymeta'];
	$next_increment     = 0;
	$qShowStatus        = "SHOW TABLE STATUS LIKE '$tablename'";
	$qShowStatusResult  = db_query($qShowStatus,$DB_CONNECT);
	
	$row = db_fetch_assoc($qShowStatusResult);
	$maxelement = $row['Auto_increment'];
	echo $maxelement;
}
?>