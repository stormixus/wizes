<div class="bc-header" id="content"<?php if($elett['bg']):?> style="background:url(<?php echo $elett['bg']?>) !important;"<?php endif?>>
  <div class="container">
  	<?php 
  		$bigtitle = $_HM['name']?$_HM['name']:$_HP['name'];
  		$bigtitle = $bigtitle?$bigtitle:$_tmp['location']['name'];
  	?>
    <div class="breadcrumb-text">
	  <h4 class="caption">
	    <?php echo $bigtitle?>
	  </h4>
	  <p>
	  	<?php echo $g['location']?>
	  </p>
	</div>
  </div>
</div>