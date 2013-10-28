var codropsEvents = {
	<?php 
	$_RCD=getDbArray($table['bbsdata'],($bbsid?'bbs='.$bbsid.' and ':'').'display=1 and site='.$_HS['uid'],'*','gid','asc',0,1);
	$Rrow = getDbRows($table['bbsdata'],($bbsid?'bbs='.$bbsid.' and ':'').'display=1 and site='.$_HS['uid']);
	?>
	<?php $z=1; while($_R=db_fetch_array($_RCD)):?>
	'<?php echo getDateFormat($_R['d_regis'],'m-d-Y')?>' : '<a href="<?php echo getPostLink($_R)?>"><?php echo $_R['subject']?></a>'<?php if($z!=$Rrow):?>,<?php endif?>
	<?php $z++;endwhile?>
};