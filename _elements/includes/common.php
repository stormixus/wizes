<?php
$obj = explode('&',urldecode($edata));
$dataset = '';
if($_eleuid) {
	$eleuid = getDbData($table['laymeta'],'uid='.$_eleuid,'*');
	$eleval = unserialize($eleuid['value']);
}
if($eleval) {
	$elekey = $eleval;
	$z=0;
	$elekeys = array_keys($elekey);
	$elevals = array_values($elekey);
	foreach($elekeys as $o) {
		if($o=='uid'&&$edit!='m'){
			list($k, $v) = array($o,$ele['uid']);
		} elseif($o=='uid'&&$edit=='m'){
			list($k, $v) = array($o,$eleuid['uid']);
		} else {
			list($k, $v) = array($o,$elevals[$z]);
		}
		$dataset .= ' data-'.$k.'="'.$v.'"';
		$z++;
	}	
} else {
	foreach($obj as $o) {
		list($k, $v) = explode('=', $o);
		$elekey[ $k ] = $v;
		$dataset .= ' data-'.$k.'="'.$v.'"';
	}
}

if($edit=='n') {
	$tablename      = $table['laymeta'];
	$next_increment     = 0;
	$qShowStatus        = "SHOW TABLE STATUS LIKE '$tablename'";
	$qShowStatusResult  = db_query($qShowStatus,$DB_CONNECT);
	
	$row = db_fetch_assoc($qShowStatusResult);
	$maxelement = $row['Auto_increment'];
	$elekey['uid'] = $maxelement;
}
$eletype = $_eletype;
$eletitle = $_eletitle;
?>
