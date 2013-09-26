<table class="table table-striped">
	<tbody>
		<tr>
			<td>컬럼넓이</td>
			<td>
				<select name="col">
				<?php for($k = 1; $k < 13; $k++):?>
				<option value="<?php echo $i?>"<?php if($wdgvar['col']==$i || (!$wdgvar['col']&&$k==5)):?> selected="selected"<?php endif?>><?php echo $k?>개</option>
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
					<option value="<?php echo $R['uid']?>^<?php echo $R['name']?>^<?php echo RW('m=bbs&bid='.$R['id'])?>"<?php if($wdgvar['bid']==$R['uid']):?> selected="selected"<?php endif?>>ㆍ<?php echo $R['name']?>(<?php echo $R['id']?>)</option>
					<?php endwhile?>
				</select>
			</td>
		</tr>
		<tr>
			<td>타이틀</td>
			<td><input type="text" class="form-control input-sm" placeholder="타이틀" value="<?php echo $wdgvar['title']?$wdgvar['title']:'최근포스트'?>"/></td>
		</tr>
		<tr>
			<td>링크</td>
			<td><input type="text" class="form-control input-sm" placeholder="링크" value="<?php echo $wdgvar['link']?>"/></td>
		</tr>
		<tr>
			<td>노출개수</td>
			<td>
				<select name="limit">
				<?php for($i = 1; $i < 21; $i++):?>
				<option value="<?php echo $i?>"<?php if($wdgvar['limit']==$i || (!$wdgvar['limit']&&$i==5)):?> selected="selected"<?php endif?>><?php echo $i?>개</option>
				<?php endfor?>
				</select>
			</td>
		</tr>
		<tr>
			<td>제목자르기</td>
			<td>
				<input type="text" name="sbjcut" placeholder="(미입력시 자르지 않음)" size="12" value="<?php echo $wdgvar['sbjcut']?>" class="form-control input-sm" />
			</td>
		</tr>
	</tbody>
</table>