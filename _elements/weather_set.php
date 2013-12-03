<?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common.php';?>
<table class="table table-striped">
	<input type="hidden" name="type" value="<?php echo $eletype?>"/>
	<input type="hidden" name="title" value="<?php echo urldecode($eletitle)?>"/>
	<input type="hidden" name="uid" value="<?php echo $elekey['uid']?>"/>
	<input type="hidden" name="d_regis" value="<?php echo $elekey['d_regis']?>"/>
	<input type="hidden" name="woeid" value="<?php echo $elekey['woeid']?>"/>
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
			<td>도시</td>
			<td>
				<input type="text" name="city" value="<?php echo urldecode($elekey['city'])?>" class="form-control"/>
			</td>
		</tr>
		<tr>
			<td><i class="fa fa-flickr"></i>&nbsp;배경</td>
			<td>				
				<input type="checkbox" checked data-toggle="switch" name="flickr" />
			</td>
		</tr>
		<tr>
			<td>경도</td>
			<td>
				<input type="text" name="lat" value="<?php echo $elekey['lat']?>" class="form-control" readonly="readonly"/>
			</td>
		</tr>
		<tr>
			<td>위도</td>
			<td>
				<input type="text" name="lng" value="<?php echo $elekey['lng']?>" class="form-control" readonly="readonly"/>
			</td>
		</tr>
	</tbody>
</table>
<script type="text/javascript">
	$(function(){
		$('.switch')['bootstrapSwitch']();
		$("[data-toggle='switch']").wrap('<div class="switch" />').parent().bootstrapSwitch();
		$('table.table').delegate('input[name="city"]','change keyup paste',function(){
			$.ajax({
		  		type:'POST',
		  		url:rooturl,
		  		data:{
		  			r:'home',
		  			_themePage:'ajax/getlocation',
		  			city: encodeURI($(this).val())
		  		},
		  		dataType:'json',
		  		success:function(data) {
		  			$('table.table input[name="lat"]').val(data[0]);
		  			$('table.table input[name="lng"]').val(data[1]);
		  			$('table.table input[name="woeid"]').val(data[2]);
		  		}
		  	});
		});
	})
</script>
<?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common_footer.php';?>