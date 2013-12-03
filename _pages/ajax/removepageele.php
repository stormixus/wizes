<?php
if(!defined('__KIMS__')) exit;

checkAdmin(0);

getDbDelete($table['laymeta'],'page="'.$page.'" and position="element"');
getDbDelete($table['laymeta'],'page="'.$page.'" and position="index"');
db_query("OPTIMIZE TABLE ".$table['laymeta'],$DB_CONNECT); 
?>