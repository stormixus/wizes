<?
if(!defined('__KIMS__')) exit;

checkAdmin(0);

$savePath = $g['path_file'].'wizes_sets';
if (!is_dir($savePath))
{
	mkdir($savePath,0707);
	@chmod($savePath,0707);
}

$up_tmpname = $d_regis.'_'.$fime;
$up_fileExt	= $ext?$ext:'png';
$up_tmpname	= $up_tmpname.'.'.$up_fileExt;
$up_saveFile= $savePath.'/'.$up_tmpname;
$IM = getimagesize($_FILES[$fime]['tmp_name']);
$width = $IM[0];
$height= $IM[1];
move_uploaded_file($_FILES[$fime]['tmp_name'], $up_saveFile);
$fileinfo = array($up_saveFile,$_FILES[$fime]['name'],$width,$height);
header('Content-type: text/html');
echo json_encode($fileinfo);
?>