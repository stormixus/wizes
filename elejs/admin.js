$(function($){

  $('.container .row .element-section').delegate('a.pull-element','click',function(){
  	if($(this).data('ready')) {
	  	alert('준비중인 요소입니다.');
	  	return false;
  	} else {
	  	$(this).callsetele();
  	}
  });
  
  
  $('#myModal .modal-footer').delegate('button.btn-primary','click',function(){
  	  appendele();
  });
  
  
  $('body').delegate('.sidepanel-button.unpushed','click',function(){
	  $('#sidepanel').stop(true,true).animate({'left':'0px'},500,function(){
		  $(this).removeClass('unpushed').addClass('pushed').removeAttr('style');
	  });
	  $('body').stop(true,true).animate({marginLeft:'275px'},500,function(){
		  $(this).addClass('pushed').removeAttr('style');
	  });
	  
	  $('header').stop(true,true).animate({marginLeft:'275px'},500,function(){
		  $(this).removeAttr('style');
		  $('.sidepanel-button.unpushed').removeClass('unpushed').addClass('pushed');
	  });
  });
  
  
  
  $('body').delegate('.sidepanel-button.pushed','click',function(){
	  $('#sidepanel').stop(true,true).animate({'left':'-275px'},500,function(){
		  $(this).removeClass('pushed').addClass('unpushed').removeAttr('style');
	  });
	  $('body').stop(true,true).animate({marginLeft:'0px'},500,function(){
		  $(this).removeClass('pushed').removeAttr('style');
	  });
	  
	  $('header').stop(true,true).animate({marginLeft:'0px'},500,function(){
		  $(this).removeAttr('style');
		  $('.sidepanel-button.pushed').removeClass('pushed').addClass('unpushed');
	  });
  });
  
  
  
   $('.sidepanel-button').hover(function(){
	   $(this).stop(true,true).animate({width:'130px'},600,function(){
		   $(this).addClass('hovered');
	   });
   },function(){
	   $(this).stop(true,true).animate({width:'50px'},600,function(){
		   $(this).removeClass('hovered');
	   });
   });
   
   
  /* 부트스트랩 기본 불러오기 */
  $('.pull-element, .elepostnav>ul>li>a').tooltip();
  $('a[data-toggle="popover"]').click(function(){
  	$('a[data-toggle="popover"]').not(this).popover('hide');
  }).popover({
	  html:true,
	  title: function() {
		  return $('.'+$(this).data('popover-title')).html();
	  },
	  placement:$(this).data('direction'),
	  content:function(){
		  return $('.'+$(this).data('popover-content')).html();
	  }
  });
  
  $('a.set-top').on('shown.bs.popover', function () {
  	$('.top-group').delegate('a','click',function(){
		$('.top-group').find('a.active').removeClass('active');
		$(this).addClass('active');
		$.ajax({
	  		type:'POST',
	  		url:rooturl,
	  		data:{
	  			r:'home',
	  			_themePage:'ajax/loadtop',
	  			bbsid:$('select.selected-top').find('option:selected').val(),
	  			type:$(this).data('loadtop'),
	  			number: $('input[name="top-number"]').val()
	  		},
	  		success:function(data) {
		  		$('section#top').html(data);
	  		}
	  	});
	});
	
	$('.initTop').click(function(){
		if(confirm('정말 초기화 하시겠습니까?')) {
			$.ajax({
		  		type:'POST',
		  		url:rooturl,
		  		data:{
		  			r:'home',
		  			_themePage:'ajax/initop',
		  			d_regis: $('input[name="top-d_regis"]').val(),
		  			page:$('#wizes').data('page')
		  		},
		  		success:function(data) {
			  		$('header#top').html(data);
		  		}
		  	});
	  	}	  
	  });
	  
	$('.saveTop').click(function(){
		if(confirm('이대로 저장 하시겠습니까?')) {
			$.ajax({
		  		type:'POST',
		  		url:rooturl,
		  		data:{
		  			r:'home',
		  			_themePage:'ajax/savetop',
		  			page:$('#wizes').data('page'),
		  			bbsid:$('select.selected-top option:selected').val(),
		  			type:$('.top-group a.active').data('loadtop'),
		  			number: $('input[name="top-number"]').val(),
		  			d_regis: $('input[name="top-d_regis"]').val()
		  		},
		  		success:function(data) {
		  			alert('저장 되었습니다.');
		  			$('a.set-top').popover('hide');
		  		}
		  	});
	  	}	  
	  });
  });
  
  $('.iconbar-horizontal li').delegate('a.initele','click',function(){
	 if(confirm('정말 초기화 하시겠습니까?\n초기화 이후에는 복구할 수 없습니다.')) {
	 	$.ajax({
	  		type:'POST',
	  		url:rooturl,
	  		data:{
	  			r:'home',
	  			_themePage:'ajax/removepageele',
	  			page:$('#wizes').data('page'),
	  		},
	  		success:function(data) {
		  		$('#wizes .container .row').empty();
	  		}
	  	});
		
	 }
  });
  
  $('.iconbar-horizontal li').delegate('a.savele','click',function(){
	 if(confirm('저장 하시겠습니까?')) {
		savesequence();
	 }
  });
  
  $('a.remove-element').click(function(){
	$(this).closest('.element').remove();
  });
  
  $('.element').delegate('a.setting-element','click',function(){
	  $(this).closest('.element').addClass('Eedit');
	  $(this).callsetele();
  });
  
  
  
  $.fn.removelement = function() {
     $(this).delegate('a.remove-element','click',function(){
	 	$(this).closest('.element').remove();
	 });
  };
  
  $.fn.retriveset = function() {
     $(this).delegate('a.setting-element','click',function(){
     	$(this).closest('.element').addClass('Eedit');
	 	$(this).callsetele();
	 });
  };
  
  $.fn.callsetele = function() {
  	 $('#myModal h4.modal-title').text(decodeURI($(this).data('title'))+' 설정');
	 $('#myModal').data('element',$(this).data('element')).modal('show');
     $.ajax({
  		type:'POST',
  		url:rooturl,
  		data:{
  			r:'home',
  			_element:$(this).data('element')+'_set',
  			_eletype:$(this).data('element'),
  			_eletitle:$(this).data('title'),
  			_eled_regis: $(this).data('d_regis')
  		},
  		success:function(html){
  			$('#myModal .modal-body').html(html);
  		}
  	});
  };
  
  $.fn.datattr = function() {
  	var dataarr = '';
    $(this).each(function() {
      var subarr = {};
	  $.each(this.attributes, function() {
	    if(this.specified&&this.name!='class'&&this.name!='id') {
	    	var key = this.name;
	    	var key = key.replace('data-', '');
	    	var value = this.value;
	    	var value = value.replace('&','*amp;');
	    	var value = encodeURI(this.value);
	    	subarr[key] = value;
	    }
	  });
	  dataarr = subarr;
	});
	return dataarr;
  };
  
  $.fn.savelemnt = function(t) {
  	$.ajax({
  		type:'POST',
  		url:rooturl,
  		data:{
  			r:'home',
  			_themePage:'ajax/saveelement',
  			uid:$(this).data('uid'),
  			page:$('#wizes').data('page'),
  			value: encodeURIComponent(JSON.stringify($(this).datattr())),
  			d_regis: $(this).data('d_regis'),
  			edit:t
  		},
  		success: function(){
	  		$('.element.editing').removeClass('editing');
  		}
  	});
  };
  
  function appendele() {
	  $('#myModal table.table').wrap('<form class="eleset"></form>');
	  $('form.eleset input[name="link"]').val(encodeURIComponent($('form.eleset input[name="link"]').val()));
  	  var ele = $('form.eleset').serialize();
	  $.ajax({
  		type:'POST',
  		url:rooturl,
  		data:{
  			r:'home',
  			_element:$('#myModal').data('element'),
  			edata: ele,
  		},
  		success:function(html){
  			$result = $(html).filter('.element').addClass('editing');
  			if($('#wizes .container .Eedit').length) {
  				$result.savelemnt('m');
	  			$('#wizes .container .Eedit').after($result).remove();
  			} else {
  				$result.savelemnt('n');
	  			$('#wizes .container .row:last').append($result);	
  			}
  			$('#myModal').modal('hide');
  			$('.element-header .element-switchs').removelement();
  			$('.element-header .element-switchs').retriveset();
  			$('.sortable').sortable({
				items:'.element',
				handle:'.handle'
			});					
  		}
  	});
  	$('form.eleset').remove();
  	}
  	
  	function savesequence() {
  		var sequence = new Array();
	  	$('#wizes .container .element').each(function(){
	  		sequence.push($(this).data('d_regis'));				  	
	  	});
	  	$.ajax({
	  		type:'POST',
	  		url:rooturl,
	  		data:{
	  			r:'home',
	  			_themePage:'ajax/savesequence',
	  			page:$('#wizes').data('page'),
	  			value:sequence
	  		},
	  		success:function() {
		  		alert('저장되었습니다.');
	  		}
	  	});
  	}
  	
  	//설정패널 토글
  	$('.switch.switch-square').delegate('input[name="panelshow"]','change',function(){
	  $('.element-icons,.handle').slideToggle();
	  $('.element-section').closest('#page').slideToggle();
	  $('.elepostnav').closest('.container').slideToggle();
  	});
  	
  	
  	
});