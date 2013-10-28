<?php
$d_regis = $date['totime'];
$value = serialize($value);

$seqdata = getDbData($table['laymeta'],'page='.$page.' and position="index"','*');
if($seqdata['uid']) {
	$QVAL = "page='$page',value='$value',d_regis='$d_regis',position='index'";
	getDbUpdate($table['laymeta'],$QVAL,'uid='.$seqdata['uid']);
} else {
	$QKEY = "page,value,d_regis,position";
	$QVAL = "'$page','$value','$d_regis','index'";
	getDbInsert($table['laymeta'],$QKEY,$QVAL);
}

?>