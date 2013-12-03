<?php 
include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common.php';
?>

<div class="col-md-<?php echo $elekey['col']?> col-sm-<?php echo $elekey['col']?> element"<?php if($my['admin']):?><?php echo $dataset;?><?php endif?>>
	<?php if($my['admin']):?>
	<div class="element-header">
		<div class="element-title"><?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/handle.php';?><a href="<?php echo utf8_urldecode($elekey['link'])?>"><?php echo urldecode($elekey['eletitle'])?></a></div>
		<?php 
		include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/seticons.php';
		?>
	</div>
	<?php endif?>
	
	<?php $img = $g['path_file'].'wizes_sets/'.$elekey['img_regis'].'_imgfile.png';?>
	
	<?php if(file_exists($img)):?>
	<section class="imgwrapper">
		<?php if($elekey['link']):?>
		<a href="<?php echo $elekey['link']?>" target="<?php echo $elekey['target']?>">
			<img src="<?php echo $img?>" alt="" />
		</a>
		<?php else:?>
		<img src="<?php echo $img?>" alt="" />
		<?php endif?>
		
	</section>
	<?php endif?>
	
	<?php if($elekey['content']):?>
	<section class="boxContent">
		<?php echo urldecode($elekey['content'])?>
	</section>
	<?php endif?>
</div>