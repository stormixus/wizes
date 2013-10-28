<?php
include_once $g['path_core'].'function/menu.func.php';
$ISCAT = getDbRows($table['s_menu'],'site='.$s);
$catcode = '';
if($cat)
{
	$CINFO = getUidData($table['s_menu'],$cat);
	$ctarr = getMenuCodeToPath($table['s_menu'],$cat,0);
	$ctnum = count($ctarr);
	for ($i = 0; $i < $ctnum; $i++) $CXA[] = $ctarr[$i]['uid'];
}

$is_fcategory =  $CINFO['uid'] && $vtype != 'sub';
$is_regismode = !$CINFO['uid'] || $vtype == 'sub';
if ($is_regismode)
{
	$CINFO['menutype'] = '';
	$CINFO['name'] = '';
	$CINFO['joint'] = '';
	$CINFO['redirect'] = '';
	$CINFO['hidden'] = '';
	$CINFO['target'] = '';
	$CINFO['imghead']  = '';
	$CINFO['imgfoot']  = '';
}
?>

<style type="text/css">
/**
 * Nestable
 */

.dd { position: relative; display: block; margin: 0; padding: 0; list-style: none; font-size: 13px; line-height: 20px; }

.dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
.dd-list .dd-list { padding-left: 30px; }
.dd-collapsed .dd-list { display: none; }

.dd-item,
.dd-empty,
.dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }

.dd-handle { display: block; height: 30px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd-handle:hover { color: #2ea8e5; background: #fff; }

.dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
.dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
.dd-item > button[data-action="collapse"]:before { content: '-'; }

.dd-placeholder,
.dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
.dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
    background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff), 
                      -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff), 
                         -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff), 
                              linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-size: 60px 60px;
    background-position: 0 0, 30px 30px;
}

.dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
.dd-dragel > .dd-item .dd-handle { margin-top: 0; }
.dd-dragel .dd-handle {
    -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
            box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
}

/**
 * Nestable Extras
 */

.nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; }

#nestable-menu { padding: 0; margin: 20px 0; }

#nestable-output,
#nestable2-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }

.dd-hover > .dd-handle { background: #2ea8e5 !important; }

/**
 * Nestable Draggable Handles
 */

.dd3-content { display: block; height: 30px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd3-content:hover { color: #2ea8e5; background: #fff; }

.dd-dragel > .dd3-item > .dd3-content { margin: 0; }

.dd3-item > button { margin-left: 30px; }

.dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 30px; text-indent: 100%; white-space: nowrap; overflow: hidden;
    border: 1px solid #aaa;
    background: #ddd;
    background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
    background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
    background:         linear-gradient(top, #ddd 0%, #bbb 100%);
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 3px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 20px; font-weight: normal; }
.dd3-handle:hover { background: #ddd; }
a.collapse-item	{display: block; position: absolute; width: 30px; top: 0; right: 0; padding: 5px 10px; text-align: center;}
</style>

<div class="col-md-6">
	<div class="nav nav-bar nestable-menu">
		<a href="javascript:;" data-action="expand-all" class="btn btn-info btn-sm">모두 펼치기</a>
	    <a href="javascript:;" data-action="collapse-all" class="btn btn-warning btn-sm">모두 모으기</a>
	    <a href="javascript:;" data-action="new-menu" class="btn btn-inverse btn-sm">메뉴 추가</a>
	    <a href="javascript:;" data-action="save" class="btn btn-danger btn-sm">저장</a>
	</div>
	<div class="dd" id="nestable3">
	    <ol class="dd-list">
	    	<?php $_MENUS=getDbSelect($table['s_menu'],'site='.$s.' and depth=1 order by gid asc','*')?>
			<?php while($_M=db_fetch_array($_MENUS)):?>
			<li class="dd-item dd3-item" data-id="<?php echo $_M['uid']?>">
	            <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content"><?php echo $_M['name']?></div><a href="javascript:;" class="collapse-item" data-uid="<?php echo $_M['uid']?>"><i class="glyphicon glyphicon-chevron-right"></i></a>
	            <?php if($_M['isson']):?>
				<ol class="dd-list">
					<?php $_MENUS1=getDbSelect($table['s_menu'],'site='.$s.' and parent='.$_M['uid'].' and hidden=0 and depth=2 order by gid asc','*')?>
					<?php $_k=1;while($_M1=db_fetch_array($_MENUS1)):?>
					<li class="dd-item dd3-item" data-id="<?php echo $_M1['uid']?>">
						<div class="dd-handle dd3-handle">Drag</div><div class="dd3-content"><?php echo $_M1['name']?></div><a href="javascript:;" class="collapse-item" data-uid="<?php echo $_M1['uid']?>"><i class="glyphicon glyphicon-chevron-right"></i></a>
						<?php if($_M1['isson']):?>
						<ol class="dd-list">
							<?php $_MENUS2=getDbSelect($table['s_menu'],'site='.$s.' and parent='.$_M1['uid'].' and hidden=0 and depth=3 order by gid asc','*')?>
							<?php $_k=1;while($_M2=db_fetch_array($_MENUS2)):?>
							<li class="dd-item dd3-item" data-id="<?php echo $_M2['uid']?>">
								<div class="dd-handle dd3-handle">Drag</div><div class="dd3-content"><?php echo $_M2['name']?></div><a href="javascript:;" class="collapse-item" data-uid="<?php echo $_M2['uid']?>"><i class="glyphicon glyphicon-chevron-right"></i></a>
			                </li>
							<?php $_k++;endwhile?>
						</ol>
						<?php endif?>
	                </li>
					<?php $_k++;endwhile?>
				</ol>
				<?php endif?>
	        </li>
			<?php endwhile?>
	    </ol>
	</div>
	<textarea id="nestable2-output" class="form-control"></textarea>
</div>

<div class="col-md-6">
	<div class="dialog" style="min-height:300px;">
	  <h6>메뉴 설정</h6>
	  <p class="setting-menu panel">
		  
	  </p>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function()
{
    $('.nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });   

    $('#nestable3').nestable();
    
    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };
    
    updateOutput($('#nestable3').data('output', $('#nestable2-output')));
    
    // activate Nestable for list 2
    $('#nestable3').nestable({
        group: 1
    })
    .on('change', updateOutput);
    
    $('a.collapse-item').click(function(){
	    $(this).find('i.glyphicon').toggleClass('glyphicon-chevron-right').toggleClass('glyphicon-chevron-left');
    })

});
</script>

<script type="text/javascript" src="<?php echo  $g['path_layout'].$d['layout']['dir'].'/_pages/js/jquery.nestable.js'?>"></script>