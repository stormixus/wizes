<!-- /헤더 시작 -->
<header class="navbar-fixed-top<?php if($my['admin']):?> admin_logged<?php endif?>">
    <div class="container">
        <div class="header-inner clearfix">
            <!-- HEADER BRANDING : begin -->
            <div class="branding"><a href="<?php echo RW(0);?>"><img src="<?php echo $g['img_layout']?>/logo.png" alt="" /></a></div>
            <!-- HEADER BRANDING : end -->

            <!-- NAV TOGGLE : begin -->
            <button class="nav-toggle"><i class="icon-reorder"></i></button>
            <!-- NAV TOGGLE : end -->

            <!-- MAIN NAV : begin -->
            <nav class="main">
                <ul class="nav pull-right">
		        	<?php $_MENUS1=getDbSelect($table['s_menu'],'site='.$s.' and hidden=0 and depth=1 order by gid asc','*')?>
					<?php $_i=1;while($_M1=db_fetch_array($_MENUS1)):?>
					<li<?php if(in_array($_M1['id'],$_CA)):$g['nowFMemnu']=$_M1['uid']?> class="active"<?php endif?>><a href="<?php echo RW('c='.$_M1['id'])?>" target="<?php echo $_M1['target']?>"><span><?php echo $_M1['name']?></span></a>
						<?php if($_M1['isson']):?>
						<ul>
							<?php $_MENUS2=getDbSelect($table['s_menu'],'site='.$s.' and parent='.$_M1['uid'].' and hidden=0 and depth=2 order by gid asc','*')?>
							<?php $_k=1;while($_M2=db_fetch_array($_MENUS2)):?>
							<li<?php if(in_array($_M2['id'],$_CA)):?> class="active"<?php endif?>><a href="<?php echo RW('c='.$_M1['id'].'/'.$_M2['id'])?>"><span><?php echo $_M2['name']?></span></a></li>
							<?php $_k++;endwhile?>
						</ul>
						<?php endif?>
					</li>
					<?php $_i++;endwhile?>
				</ul> <!-- /nav -->                 
            </nav>
            <!-- MAIN NAV : end -->
        </div>
    </div>
</header>
<!-- /헤더 끝 -->