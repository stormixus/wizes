<?php if($my['admin']):?>
<?php include  $g['path_layout'].$d['layout']['dir'].'/_cross/sidepanel.php'?>
<?php endif?>

<?php include  $g['path_layout'].$d['layout']['dir'].'/_cross/header.php'?>


<section id="top">
<?php
$eletop = getDbData($table['laymeta'],'position="top" and page='.$_HP['uid'],'*');
if($eletop['d_regis']&&!$_themePage){
	$elett = unserialize($eletop['value']);
	include  $g['path_layout'].$d['layout']['dir'].'/_cross/top/'.$elett['type'].'.php';
} else {
	include  $g['path_layout'].$d['layout']['dir'].'/_cross/top/breadcrumb.php';
}

?>
</section>



<?php if(!$_themePage):?>
<?php include  $g['path_layout'].$d['layout']['dir'].'/_cross/elementpanel.php';?>
<?php endif?>


<div class="clearfix"></div>


<div id="wizes" data-page="<?php echo $_HP['uid']?>">
	<div class="container">
		<div class="row sortable">
			<?php if(!$_themePage):?>
			<?php
			$eleindex = getDbData($table['laymeta'],'position="index" and page='.$_HP['uid'],'*');
			$eleindex = unserialize($eleindex['value']);
			foreach($eleindex as $E) {
				$ele = getDbData($table['laymeta'],'d_regis='.$E,'*');
				$eleval = unserialize($ele['value']);
				include  $g['path_layout'].$d['layout']['dir'].'/_elements/'.$eleval['type'].'.php';
			}
			?>
			<?php endif?>
			<?php include __KIMS_CONTENT__?>
		</div>
	</div>
</div>

<?php if($my['admin']&&!$_themePage):?>
<div class="container">
	<div class="row">
		<div class="iconbar iconbar-horizontal pull-right elepostnav" style="margin-right:0px !important;">
		  <ul>
		    <li><a href="javascript:;" class="glyphicon glyphicon-remove-circle initele" data-toggle="tooltip" title="초기화"></a></li>
		    <li><a href="javascript:;" class="glyphicon glyphicon-pushpin postele" data-toggle="tooltip" title="템플릿으로 저장"></a></li>
		    <li><a href="javascript:;" class="glyphicon glyphicon-floppy-disk savele" data-toggle="tooltip" title="저장"></a></li>
		  </ul>
		</div>
	</div>
</div>
<?php endif?>

<?php include  $g['path_layout'].$d['layout']['dir'].'/_cross/footer.php'?>

<?php if($my['admin']):?>

<?php include  $g['path_layout'].$d['layout']['dir'].'/_cross/forsetting.php'?>
  
<?php endif?>