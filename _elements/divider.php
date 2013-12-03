<?php 
include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common.php';
?>

<div class="element clear col-md-12"<?php if($my['admin']):?><?php echo $dataset;?><?php endif?>>
	<?php if($my['admin']):?>
	<div class="element-header">
		<div class="element-title"><?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/handle.php';?><a href="<?php echo utf8_urldecode($elekey['link'])?>"><?php echo urldecode($elekey['eletitle'])?></a></div>
		<?php 
		include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/seticons.php';
		?>
	</div>
	<?php endif?>
</div>