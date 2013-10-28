<?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common.php';?>
<table class="table table-striped">
	<input type="hidden" name="type" value="<?php echo $eletype?>"/>
	<input type="hidden" name="title" value="<?php echo urldecode($eletitle)?>"/>
	<input type="hidden" name="uid" value="<?php echo $elekey['uid']?>"/>
	<input type="hidden" name="d_regis" value="<?php echo $elekey['d_regis']?>"/>
	<tbody>
		<tr>
			<td>컬럼넓이</td>
			<td>
				<select name="col">
				<?php for($k = 1; $k < 13; $k++):?>
				<option value="<?php echo $k?>"<?php if($elekey['col']==$k || (!$elekey['col']&&$k==4)):?> selected="selected"<?php endif?>>md-<?php echo $k?></option>
				<?php endfor?>
				</select>
			</td>
		</tr>
		<tr>
			<td>게시판 선택</td>
			<td>
				<select name="bbsid">
					<option value="">&nbsp;+ 전체게시물</option>
					<option value="">----------------------------------</option>
					<?php $BBSLIST = getDbArray($table['bbslist'],'','*','gid','asc',0,1)?>
					<?php while($R=db_fetch_array($BBSLIST)):?>
					<option value="<?php echo $R['uid']?>" data-elename="<?php echo $R['name']?>" data-eleblink="<?php echo RW('m=bbs&bid='.$R['id'])?>"<?php if($elekey['bbsid']==$R['uid']):?> selected="selected"<?php endif?>>ㆍ<?php echo $R['name']?>(<?php echo $R['id']?>)</option>
					<?php endwhile?>
				</select>
			</td>
		</tr>
	</tbody>
</table>
<?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common_footer.php';?>