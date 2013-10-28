<?php 
include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common.php';
?>
<div class="col-md-<?php echo $elekey['col']?> element"<?php if($my['admin']):?><?php echo $dataset;?><?php endif?>>
	<div class="element-header">
		<div class="element-title"><?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/handle.php';?><a href="<?php echo utf8_urldecode($elekey['link'])?>"><?php echo urldecode($elekey['eletitle'])?></a></div>
		<?php 
		include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/seticons.php';
		?>
	</div>
<?php
$weatherparam = 'http://api.openweathermap.org/data/2.1/find/city?lat='.$elekey['lat'].'&lon='.$elekey['lng'].'&cnt=1&units=metric';
$wstring .= file_get_contents($weatherparam); // get json content
$json_a = json_decode($wstring, true); //json decoder
?>
	<section class="weather">
		<?php $list = $json_a['list'][0]?>
		<h3><?php echo $list['name']?> <i class="wi-up text-right" style="filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=<?php echo $list['wind']['deg']/10;?>);-webkit-transform: rotate(<?php echo $list['wind']['deg']?>deg);-moz-transform: rotate(<?php echo $list['wind']['deg']?>deg);-ms-transform: rotate(<?php echo $list['wind']['deg']?>deg);-o-transform: rotate(<?php echo $list['wind']['deg']?>deg);transform: rotate(<?php echo $list['wind']['deg']?>deg);"></i></h3>
		<?php 
		$wcode = $list['weather'][0]['id'];
		$wicon = $list['weather'][0]['icon'];
		if($wcode>199&&$wcode<233) {
			$wi = 'thunderstorm';
		} elseif($wcode>299&&$wcode<322){
			$wi = 'showers';
		} elseif($wcode>499&&$wcode<505){
			$wi = 'day-showers';
		} elseif($wcode>510&&$wcode<523){
			$wi = 'night-showers';
		} elseif($wcode==511){
			$wi = 'night-snow';
		} elseif($wcode>599&&$wcode<622){
			$wi = 'night-alt-snow';
		} elseif($wcode>700&&$wcode<742){
			$wi = 'fog';
		} elseif($wcode==800&&$wicon=='01d'){
			$wi = 'day-sunny';
		} elseif($wcode==800&&$wicon=='01n'){
			$wi = 'night-clear';
		} elseif($wcode==801&&$wicon=='02d'){
			$wi = 'day-cloudy';
		} elseif($wcode==801&&$wicon=='02n'){
			$wi = 'night-cloudy';
		} elseif($wcode==802&&$wicon=='03d'){
			$wi = 'day-cloudy-windy';
		} elseif($wcode==802&&$wicon=='03n'){
			$wi = 'night-alt-cloudy-windy';
		} elseif($wcode==803&&$wicon=='04d'){
			$wi = 'day-cloudy';
		} elseif($wcode==803&&$wicon=='04n'){
			$wi = 'night-cloudy';
		} elseif($wcode==804&&$wicon=='04d'){
			$wi = 'day-sunny-overcast';
		} elseif($wcode==804&&$wicon=='04n'){
			$wi = 'night-alt-cloudy-gusts';
		} else {
			$wi = 'refresh';
		}	 
		?>
		<div class="temperature wi-<?php echo $wi?>">
			<?php 
			$condition = $list['main'];
			$temp = round($condition['temp']- 273.15,2);
			$tempmin = round($condition['temp_min']- 273.15,2);
			$tempmax = round($condition['temp_max']- 273.15,2);
			?>
		  <h3 class="current"><?php echo $temp;?>&nbsp;<i class="wi-celcius"></i></h3>
		  <h4 class="high"><i class="fa fa-angle-up"></i>&nbsp;<?php echo $tempmax;?>&nbsp;<i class="wi-celcius"></i></h4>
		  <h4 class="low"><i class="fa fa-angle-down"></i>&nbsp;<?php echo $tempmin;?>&nbsp;<i class="wi-celcius"></i></h4>
		</div>
		
		<ul>
		  <li class="fa fa-leaf text-left">
		    <span><?php echo $list['wind']['speed']?> mph</span>
		  </li>
		  <li class="fa fa-tint text-center">
		    <span><?php echo $condition['humidity']?>%</span>
		  </li>
		  <li class="fa fa-umbrella text-right">
		    <span><?php echo $list['rain']['3h']?>%</span>
		  </li>
		</ul>
	</section>
</div>

