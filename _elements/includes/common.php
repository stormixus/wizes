<?php
$obj = explode('&',urldecode($edata));
$dataset = '';
if($_eled_regis) {
	$eleuid = getDbData($table['laymeta'],'d_regis='.$_eled_regis,'*');
	$eleval = unserialize($eleuid['value']);
}
if($eleval) {
	$elekey = $eleval;
	$z=0;
	$elekeys = array_keys($elekey);
	$elevals = array_values($elekey);
	foreach($elekeys as $o) {
		list($k, $v) = array($o,$elevals[$z]);
		$dataset .= ' data-'.$k.'="'.$v.'"';
		$z++;
	}	
} else {
	foreach($obj as $o) {
		list($k, $v) = explode('=', $o);
		$elekey[ $k ] = $v;
		$dataset .= ' data-'.$k.'="'.$v.'"';
	}
	$dataset .= ' data-d_regis="'.$date['totime'].'"';
	$elekey['d_regis'] = $date['totime'];
}
$eletype = $_eletype;
$eletitle = $_eletitle;
?>
