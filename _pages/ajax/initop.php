<?php
getDbDelete($table['laymeta'],'page="'.$page.'" and position="'.$position.'"');
if($position=='top') {
	include  $g['path_layout'].$d['layout']['dir'].'/_cross/top/breadcrumb.php';
} else {
	unlink($g['path_file'].'wizes_sets/'.$d_regis.'_'.$position.'.png');
}
?>