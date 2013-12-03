<?php 
include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common.php';
?>
<?php
$addr = $elekey['addr1'].' '.$elekey['addr2'];
$addr = str_replace(' ', '+', $addr);
$fullurl = "http://maps.googleapis.com/maps/api/geocode/json?address=".$addr."&sensor=true";
$string .= file_get_contents($fullurl); // get json content
$json_a = json_decode($string, true); //json decoder

$json_lat =  $json_a['results'][0]['geometry']['location']['lat']; // get lat for json
$json_lng = $json_a['results'][0]['geometry']['location']['lng']; // get ing for json
?>
<div class="col-md-<?php echo $elekey['col']?> col-sm-<?php echo $elekey['col']?> element"<?php if($my['admin']):?><?php echo $dataset;?><?php endif?>>
	<div class="element-header">
		<div class="element-title"><?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/handle.php';?><a href="<?php echo utf8_urldecode($elekey['link'])?>"><?php echo urldecode($elekey['eletitle'])?></a></div>
		<?php 
		include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/seticons.php';
		?>
	</div>
	<div id="map_canvas" style="width:100%; height:<?php echo $elekey['height']?>px"></div>
	<script type = "text/javascript">

	var gMapsLoaded = false;
	window.gMapsCallback = function(){
	    gMapsLoaded = true;
	    $(window).trigger('gMapsLoaded');
	}
	window.loadGoogleMaps = function(){
	    if(gMapsLoaded) return window.gMapsCallback();
	    var script_tag = document.createElement('script');
	    script_tag.setAttribute("type","text/javascript");
	    script_tag.setAttribute("src","http://maps.google.com/maps/api/js?sensor=false&callback=gMapsCallback");
	    (document.getElementsByTagName("head")[0] || document.documentElement).appendChild(script_tag);
	}
	
	$(document).ready(function(){
	    function initialize(){
	    	var myLatlng = new google.maps.LatLng(<?php echo $json_lat?>, <?php echo $json_lng?>);
	        var mapOptions = {
	            zoom: <?php echo $elekey['zoom']?>,
	            center: myLatlng,
	            mapTypeId: google.maps.MapTypeId.<?php echo $elekey['maptype']?>
	        };
	        map = new google.maps.Map(document.getElementById('map_canvas'),mapOptions);
	        
	        marker = new google.maps.Marker({
				position: myLatlng,
			    map: map,
			    title:"<?php echo $elekey['addr1'].'<br />'.$elekey['addr2']?>"
			});
	    }
	    $(window).bind('gMapsLoaded', initialize);
	    window.loadGoogleMaps();
	});
	 
	</script>
</div>



