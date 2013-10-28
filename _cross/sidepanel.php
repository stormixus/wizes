<div class="navbar-fixed-top" id="sidepanel">
	<div class="item">
      <i class="glyphicon glyphicon-cutlery"></i> <img src="<?php echo $g['img_layout']?>/logo.png" alt="">
    </div>
    <div class="item">
      <b><i class="glyphicon glyphicon-eye-open"></i>미리보기</b>
      <div class="menu">
      	<div class="item">
      		<span class="alignleft">설정패널</span>
      		<div class="switch switch-square" data-on-label="<i class='glyphicon glyphicon-ok'></i>" data-off-label="<i class='glyphicon glyphicon-remove'></i>">
			  <input type="checkbox" checked="checked" name="panelshow"/>
			</div>
      	</div>       
      </div>
    </div>
    
    <div class="item">
    	<b><i class="glyphicon glyphicon-wrench"></i>&nbsp;도구</b>
    	<div class="menu">
    		<a href="javascript:;" class="item set-mainslider" data-toggle="popover" data-direction="right" data-popover-title="popover-title_logo"  data-popover-content="popover-content_logo">로고 설정</a>
	    	<a href="javascript:;" class="item set-top" data-toggle="popover" data-direction="right" data-popover-title="popover-title_top"  data-popover-content="popover-content_top">탑 부분 설정</a>
	    	<a href="javascript:;" class="item set-bcbg" data-toggle="popover" data-direction="right" data-popover-title="popover-title_top"  data-popover-content="popover-content_top">Breadcrumb 배경 설정</a>
	    	<a href="<?php echo RW('_themePage=set-menu')?>" class="item set-menu">메뉴 설정</a>
	    	<a href="javascript:;" class="item set-sidebar">사이드바 설정</a>
	    	<a href="javascript:;" class="item set-template" data-toggle="popover" data-direction="right" data-popover-title="popover-title_template"  data-popover-content="popover-content_template">저장된 컨텐츠 템플릿 보기</a>
	    	<a href="javascript:;" class="item set-footer">풋터 설정</a>
	    	<a href="javascript:;" class="item set-ㅡmedia">미디어</a>
    	</div>
    </div>
</div>

<div class="sidepanel-button unpushed">
  <i class="glyphicon glyphicon-list"></i>
  <span class="text">설정</span>
</div>

<style type="text/css">
/*=============================
 Side Panel
 ==============================*/
.sidepanel-button {
	position: fixed;
	top: 60px;
	z-index: 5000;
	width: 50px;
	background-color: #4C4C4C;
	color: #FFFFFF;
	font-size: 21px;
	display: block;
	padding: 16px 30px 16px 15px;
	cursor: pointer;
	min-height: 58px;
	border-radius: 0px 10px 10px 0px;
	overflow: hidden;	
}
.sidepanel-button > span {
	position: absolute;
	left: 50px;
	top: 18px;
	text-transform: uppercase;
	font-weight: bold;
	font-family: 'Nanum Gothic';
	display: block;
	width: 50px;
}
#sidepanel {
	width: 275px;
	height: 100% !important;
	background: #333333;
	box-shadow: none;
	z-index: 500;
	left:-275px;
}
#sidepanel.unpushed {
	left:-275px;
}
#sidepanel.pushed {
	left:0px;
}


#sidepanel .item {
  display: block;
  height: auto !important;
  width: 100%;
  border-top: none;
  border-left: 0em solid rgba(0, 0, 0, 0);
  border-right: none;
  text-align: center;
  padding: 14px 16px;
  box-sizing: border-box;
}
#sidepanel > .item:first-child {
  border-radius: 0.1875em 0.1875em 0px 0px;
}
#sidepanel > .item:last-child {
  border-radius: 0px 0px 0.1875em 0.1875em;
}
#sidepanel .item > .label {
  float: right;
  text-align: center;
}
#sidepanel .item > .icon:not(.input) {
  float: right;
  width: 1.22em;
  margin: 0em 0em 0em 0.5em;
}
#sidepanel .item > .label + .icon {
  float: none;
  margin: 0em 0.25em 0em 0em;
}
/*--- Sub Menu ---*/
#sidepanel .item > .menu {
  margin: 0.5em -0.95em 0em;
}
#sidepanel .item > .menu > .item {
  padding: 0.5rem 1.5rem;
  font-size: 0.875em;
}
#sidepanel .item > .menu > .item:before {
  display: none;
}

#sidepanel .item span.alignleft{display: block; float: left; position: relative; top: 5px;}
/*--- Menu Color ---*/
#sidepanel .header.item {
  margin: 0em;
  background-color: rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
}
#sidepanel .item,
#sidepanel .item > a {
  color: #FFFFFF;
}
#sidepanel .item .item,
#sidepanel .item .item > a {
  color: rgba(255, 255, 255, 0.8);
}
#sidepanel .dropdown.item .menu .item,
#sidepanel .dropdown.item .menu .item a {
  color: rgba(0, 0, 0, 0.75) !important;
}
#sidepanel .item.disabled,
#sidepanel .item.disabled:hover,
#sidepanel .item.disabled.hover {
  color: rgba(255, 255, 255, 0.2);
}
#sidepanel .item .popover-content {
	min-width: 120px;
	padding: 10px;
	color: #333333;
}
/*--- Hover ---*/
.ui.link.inverted.menu .item:hover,
#sidepanel .item.hover,
#sidepanel .link.item:hover,
#sidepanel a.item:hover,
#sidepanel .dropdown.item.hover,
#sidepanel .dropdown.item:hover {
  background-color: rgba(255, 255, 255, 0.1);
}
#sidepanel a.item:hover,
#sidepanel .item.hover,
#sidepanel .item > a:hover,
#sidepanel .item .menu a.item:hover,
#sidepanel .item .menu a.item.hover,
#sidepanel .item .menu .link.item:hover,
#sidepanel .item .menu .link.item.hover {
  color: #ffffff;
}
/*--- Down ---*/
#sidepanel a.item:active,
#sidepanel .dropdown.item:active,
#sidepanel .link.item:active,
#sidepanel a.item:active {
  background-color: rgba(255, 255, 255, 0.15);
}
/*--- Active ---*/
#sidepanel .active.item {
  box-shadow: none !important;
  background-color: rgba(255, 255, 255, 0.2);
}
#sidepanel .active.item,
#sidepanel .active.item a {
  color: #ffffff !important;
}
#sidepanel .item .menu .active.item {
  background-color: rgba(255, 255, 255, 0.2);
  color: #ffffff;
}
/*--- Pointers ---*/
#sidepanel .active.item:after {
  background-color: #505050;
  box-shadow: none;
}
#sidepanel .active.item:hover:after {
  background-color: #3B3B3B;
}

/*--- Sizes ---*/
#sidepanel .item {
  font-size: 1.125em;
}
#sidepanel .item>i {
	font-size: 1.5em !important;
	display: block;
	text-align: center;
	margin: 5px auto;
	-webkit-border-radius: 500em !important;
	-moz-border-radius: 500em !important;
	border-radius: 500em !important;
	padding: 0.5em 0.35em !important;
	-webkit-box-shadow: 0em 0em 0em 0.1em rgba(0, 0, 0, 0.1) inset;
	-moz-box-shadow: 0em 0em 0em 0.1em rgba(0, 0, 0, 0.1) inset;
	box-shadow: 0em 0em 0em 0.1em rgba(0, 0, 0, 0.1) inset;
	line-height: 1 !important;
	width: 2em !important;
	background-color: rgb(217, 92, 92);
}
#sidepanel .item>b>i{
	font-size: 0.85em;
	width: 25px;
	position: relative;
	top: -1px;
}
#sidepanel .item .item {
  font-size: 0.875em;
}
#sidepanel .dropdown.item .item {
  font-size: 1em;
}
</style>