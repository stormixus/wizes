<?php if($my['admin']):?>
<div class="element-icons">
	<div class="element-switchs pull-right">
		<a href="javascript:;" class="setting-element"<?php if($my['admin']):?> data-element="<?php echo $elekey['type']?>" data-title="<?php echo $elekey['title']?>" data-d_regis="<?php echo $elekey['d_regis']?>"<?php endif?>><i class="glyphicon glyphicon-cog"></i></a>
		<a href="javascript:;" class="remove-element"><i class="glyphicon glyphicon-remove"></i></a>
	</div>
</div>
<?php endif?>