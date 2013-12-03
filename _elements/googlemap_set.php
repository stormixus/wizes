<?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common.php';?>
<table class="table table-striped">
	<input type="hidden" name="edit" value="<?php echo $edit?>"/>
	<input type="hidden" name="type" value="<?php echo $eletype?>"/>
	<input type="hidden" name="title" value="<?php echo urldecode($eletitle)?>"/>
	<input type="hidden" name="uid" value="<?php echo $elekey['uid']?$elekey['uid']:$_eleuid?>"/>
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
			<td>타이틀</td>
			<?php
			$temptitle = $elekey['eletitle']?$elekey['eletitle']:'위치정보';
			?>
			<td><input type="text" class="form-control input-sm" placeholder="타이틀" value="<?php echo urldecode($temptitle)?>" name="eletitle"/></td>
		</tr>
		<tr>
			<td>줌</td>
			<td>
				<div class="control-group">
				  	<?php
					$zoom = $elekey['zoom']?$elekey['zoom']:'8';
					?>
				  <input type="number" name="zoom" value="<?php echo $zoom;?>" />
				</div>
			</td>
		</tr>
		<tr>
			<td>줌</td>
			<td>
				<div class="control-group">
					<select name="maptype">
				  	<?php 
				  	$maptype = array('ROADMAP','SATELLITE','HYBRID','TERRAIN');
				  	$mapname = array('기본 로드맵 보기를 표시합니다.','Google 어스 위성 이미지를 표시합니다.','일반 뷰와 위성 보기를 혼합하여 표시합니다.','지형 정보를 바탕으로 실제 지도를 표시합니다.');
				  	$r=0;
				  	foreach($maptype as $M):
				  	?>
				  	<option value="<?php echo $M?>"<?php if($elekey['maptype']==$M):?> selected="selected"<?php endif?>><?php echo $mapname[$r]?></option>
				  	<?php $r++;endforeach;?>
					</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>요소 높이</td>
			<td>
				<div class="control-group">
				  <input type="number" name="height" value="<?php echo $elekey['height'];?>" />px
				</div>
			</td>
		</tr>
		<tr>
			<td>주소</td>
			<td>
				<input type="hidden" name="zip1" id="zip1" /><input type="hidden" name="zip2" id="zip2" />
				<div class="input-group input-group-sm">
			      <input type="text" name="addr1" id="addr1" value="<?php echo urldecode($elekey['addr1'])?>" class="form-control"/>
			      <span class="input-group-btn">
			        <button type="button" class="btn btn-info" onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&m=zipsearch&zip1=zip1&zip2=zip2&addr1=addr1&focusfield=addr2');">주소검색</button>
			      </span>
			    </div><!-- /input-group -->
			    <br />
			    <div class="input-group input-group-sm">
					<input type="text" name="addr2" id="addr2" value="<?php echo urldecode($elekey['addr2'])?>" class="form-control" />
			    </div>
			</td>
		</tr>
	</tbody>
</table>
<?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common_footer.php';?>