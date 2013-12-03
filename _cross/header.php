<!-- /헤더 시작 -->
<header id="home"<?php if($my['admin']):?> class="admin-logged"<?php endif?>>
	<div class="navbar navbar-fixed-top navbar-<?php echo $d['layout']['navbar']?>">
	  <div class="container">
	    <div class="navbar-header">
	    	<?php 
			$elelogo = getDbData($table['laymeta'],'position="logo" and page="'.$pageindex.'"','*');
			if(!$elelogo['uid']) $elelogo = getDbData($table['laymeta'],'position="logo" and page="'.$_HS['uid'].'_all"','*');
			$Setlogo = $g['path_file'].'wizes_sets/'.$elelogo['d_regis'].'_logo.png';
			if (file_exists($Setlogo)):?>
			<a href="<?php echo RW(0);?>" class="navbar-brand"><img src="<?php echo $Setlogo?>" alt="메인으로" style="width:82px;"/></a>
			<?php else:?>
			<a href="<?php echo RW(0);?>" class="navbar-brand"><img src="<?php echo $g['img_layout']?>/logo.png" alt="메인으로"/></a>
			<?php endif?>	      
	      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	    </div>
	    <div class="navbar-collapse collapse navbar-right" id="navbar-main">
	      <ul class="nav navbar-nav">
	      	<?php $_MENUS1=getDbSelect($table['s_menu'],'site='.$s.' and hidden=0 and depth=1 order by gid asc','*')?>
			<?php $_i=1;while($_M1=db_fetch_array($_MENUS1)):?>
	        <li class="<?php if($_M1['isson']):?>dropdown<?php endif?><?php if(in_array($_M1['id'],$_CA)):$g['nowFMemnu']=$_M1['uid']?> active<?php endif?>">
				<a class="dropdown-toggle" href="<?php echo RW('c='.$_M1['id'])?>" target="<?php echo $_M1['target']?>"><?php echo $_M1['name']?><?php if($_M1['isson']):?> <span class="caret"></span><?php endif?></a>
				<ul<?php if($_M1['isson']):?> class="dropdown-menu"<?php endif?>>
					<?php $_MENUS2=getDbSelect($table['s_menu'],'site='.$s.' and parent='.$_M1['uid'].' and hidden=0 and depth=2 order by gid asc','*')?>
					<?php $_k=1;while($_M2=db_fetch_array($_MENUS2)):?>
	            	<li<?php if(in_array($_M2['id'],$_CA)):?> class="active"<?php endif?>><a href="<?php echo RW('c='.$_M1['id'].'/'.$_M2['id'])?>"><?php echo $_M2['name']?></a></li>
	            	<?php $_k++;endwhile?>
				</ul>
	        </li>
	        <?php endwhile;?>
	      </ul>
	    </div>
	    
	  </div>
	</div>
</header>
<!-- /헤더 끝 -->