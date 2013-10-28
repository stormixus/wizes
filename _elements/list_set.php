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
		<tr>
			<td>타이틀</td>
			<?php
			$temptitle = $elekey['eletitle']?$elekey['eletitle']:'최근포스트';
			?>
			<td><input type="text" class="form-control input-sm" placeholder="타이틀" value="<?php echo urldecode($temptitle)?>" name="eletitle"/></td>
		</tr>
		<tr>
			<td>링크</td>
			<td><input type="text" class="form-control input-sm" placeholder="링크" value="<?php echo utf8_urldecode($elekey['link'])?>" name="link"/></td>
		</tr>
		<tr>
			<td>노출개수</td>
			<td>
				<select name="limit">
				<?php for($i = 1; $i < 21; $i++):?>
				<option value="<?php echo $i?>"<?php if($elekey['limit']==$i || (!$elekey['limit']&&$i==5)):?> selected="selected"<?php endif?>><?php echo $i?>개</option>
				<?php endfor?>
				</select>
			</td>
		</tr>
		<tr>
			<td>제목자르기</td>
			<td>
				<input type="number" name="sbjcut" placeholder="(미입력시 자르지 않음)" size="12" value="<?php echo $elekey['sbjcut']?>" class="form-control input-sm only_num"  />
			</td>
		</tr>
	</tbody>
</table>
<?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common_footer.php';?>