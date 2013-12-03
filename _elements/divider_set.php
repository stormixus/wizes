<?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common.php';?>
<table class="table table-striped">
	<input type="hidden" name="type" value="<?php echo $eletype?>"/>
	<input type="hidden" name="title" value="<?php echo urldecode($eletitle)?>"/>
	<input type="hidden" name="uid" value="<?php echo $elekey['uid']?>"/>
	<input type="hidden" name="d_regis" value="<?php echo $elekey['d_regis']?>"/>
</table>
<?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common_footer.php';?>