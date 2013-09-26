<div class="col-md-4 element">
	<div class="element-header">
		<div class="element-title">리스트</div>
		<div class="element-icons">
			<div class="element-switchs pull-right">
				<a href="javascript:;" class="setting-element"><i class='fui-gear'></i></a>
				<a href="javascript:;" class="remove-element"><i class='fui-cross'></i></a>
			</div>
		</div>
	</div>
	<ul class="media-list">
		<?php $thumb = array(1,2,3,2,1,2,3,2,1,2,3,1,3,1,2);?>
		<?php foreach($thumb as $T):?>
		<li class="collage">
		    <a class="pull-left" href="#">
		      <img class="media-object" src="<?php echo $g['img_layout']?>/slide_<?php echo $T?>.png" alt="...">
		    </a>
		</li>
		<?php endforeach?>	
	</ul>
</div>