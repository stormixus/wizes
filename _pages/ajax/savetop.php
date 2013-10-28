<?php
$indexkey = array('bbsid','type','number');
$val = array($bbsid,$type,$number);
$value['bbsid'] = $bbsid;
$value['type'] = $type;
$value['number'] = $number;
$value = serialize($value);
if($d_regis) {
	$QVAL = "page='$page',value='$value',d_regis='$d_regis',position='top'";
	getDbUpdate($table['laymeta'],$QVAL,'d_regis='.$d_regis);
} else {
	$d_regis = $date['totime'];
	$QKEY = "page,value,d_regis,position";
	$QVAL = "'$page','$value','$d_regis','top'";
	getDbInsert($table['laymeta'],$QKEY,$QVAL);
}
?>