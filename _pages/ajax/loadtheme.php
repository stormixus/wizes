<?php
if(!defined('__KIMS__')) exit;

checkAdmin(0);

$_tmpdfile = $g['path_layout'].$d['layout']['dir'].'/_var/_var.php';
$d['layout'] = array();
include $_tmpdfile;

$fp = fopen($_tmpdfile,'w');
fwrite($fp, "<?php\n");
foreach ($d['layout'] as $key => $val)
{
	if($theme&&$key=='theme') {
		fwrite($fp, "\$d['layout']['".$key."'] = \"".$theme."\";\n");
	} elseif($navbar&&$key=='navbar') {
		fwrite($fp, "\$d['layout']['".$key."'] = \"".$navbar."\";\n");
	} else {
		fwrite($fp, "\$d['layout']['".$key."'] = \"".$val."\";\n");	
	}
}
fwrite($fp, "?>");
fclose($fp);
@chmod($_tmpdfile,0707);
?>