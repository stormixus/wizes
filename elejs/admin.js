/*
 * jQuery.upload v1.0.2
 *
 * Copyright (c) 2010 lagos
 * Dual licensed under the MIT and GPL licenses.
 *
 * http://lagoscript.org
 */
(function(b) {
    function m(e) {
        return b.map(n(e), function(d) {
            return '<input type="hidden" name="' + d.name + '" value="' + d.value + '"/>'
        }).join("")
    }
    function n(e) {
        function d(c, f) {
            a.push({
                name: c,
                value: f
            })
        }
        if (b.isArray(e))
            return e;
        var a = [];
        if (typeof e === "object")
            b.each(e, function(c) {
                b.isArray(this) ? b.each(this, function() {
                    d(c, this)
                }) : d(c, b.isFunction(this) ? this () : this)
            });
        else 
            typeof e === "string" && b.each(e.split("&"), function() {
                var c = b.map(this.split("="), function(f) {
                    return decodeURIComponent(f.replace(/\+/g, " "))
                });
                d(c[0], c[1])
            });
        return a
    }
    function o(e, d) {
        var a;
        a = b(e).contents().get(0);
        if (b.isXMLDoc(a) || a.XMLDocument)
            return a.XMLDocument || a;
        a = b(a).find("body").html();
        switch (d) {
        case "xml":
            a = a;
            if (window.DOMParser)
                a = (new DOMParser).parseFromString(a, "application/xml");
            else {
                var c = new ActiveXObject("Microsoft.XMLDOM");
                c.async = false;
                c.loadXML(a);
                a = c
            }
            break;
        case "json":
            a = window.eval("(" + a + ")");
            break
        }
        return a
    }
    var p = 0;
    b.fn.upload = function(e, d, a, c) {
        var f = this, g, j, h;
        h = "jquery_upload" + ++p;
        var k = b('<iframe name="' + h + '" style="position:absolute;top:-9999px" />').appendTo("body"),
        i = '<form target="' + h + '" method="post" enctype="multipart/form-data" />';
        if (b.isFunction(d)) {
            c = a;
            a = d;
            d = {}
        }
        j = b("input:checkbox", this);
        h = b("input:checked", this);
        i = f.wrapAll(i).parent("form").attr("action", e);
        j.removeAttr("checked");
        h.attr("checked", true);
        g = (g = m(d)) ? b(g).appendTo(i) : null;
        i.submit(function() {
            k.load(function() {
                var l = o(this, c), q = b("input:checked", f);
                i.after(f).remove();
                j.removeAttr("checked");
                q.attr("checked", true);
                g && g.remove();
                setTimeout(function() {
                    k.remove();
                    c === "script" && b.globalEval(l);
                    a && a.call(f, l)
                }, 0)
            })
        }).submit();
        return this
    }
})(jQuery);


$(function($){

  $('.container .row .element-section').delegate('a.pull-element','click',function(){
  	if($(this).data('ready')) {
	  	alert('준비중인 요소입니다.');
	  	return false;
  	} else {
	  	$(this).callsetele('n');
  	}
  });
  
  
  $('#myModal .modal-footer').delegate('button.btn-primary','click',function(){
  	$content = $('#editor').html();
	$('textarea#content').val(encodeURIComponent($content));
  	appendele();
  });
  
  
  $('body').delegate('.sidepanel-button.unpushed','click',function(){
	  $('#sidepanel').stop(true,true).animate({'left':'0px'},500,function(){
		  $(this).removeClass('unpushed').addClass('pushed').removeAttr('style');
	  });
	  $('body').stop(true,true).animate({marginLeft:'275px'},500,function(){
		  $(this).addClass('pushed').removeAttr('style');
	  });
	  
	  $('header').stop(true,true).animate({},500,function(){
		  $(this).removeAttr('style');
		  $('.sidepanel-button.unpushed').removeClass('unpushed').addClass('pushed');
	  });
	  
	  $('header.admin-logged .navbar').animate({'left':'275px'},500,function(){
	  });
  });
  
  
  
  $('body').delegate('.sidepanel-button.pushed','click',function(){
	  $('#sidepanel').stop(true,true).animate({'left':'-275px'},500,function(){
		  $(this).removeClass('pushed').addClass('unpushed').removeAttr('style');
	  });
	  $('body').stop(true,true).animate({marginLeft:'0px'},500,function(){
		  $(this).removeClass('pushed').removeAttr('style');
	  });
	  
	  $('header').stop(true,true).animate({},500,function(){
		  $(this).removeAttr('style');
		  $('.sidepanel-button.pushed').removeClass('pushed').addClass('unpushed');
	  });
	  $('header.admin-logged .navbar').animate({'left':'0px'},500,function(){
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
	  			r:raccount,
	  			_themePage:'ajax/loadtop',
	  			bbsid:$('select.selected-top').find('option:selected').val(),
	  			type:$(this).data('loadtop'),
	  			number: $(this).closest('.popover-content').find('input[name="number"]').val()
	  		},
	  		success:function(data) {
		  		$('section#top').html(data);
	  		}
	  	});
	});
  });
  
  $('a.set-top').on('hidden.bs.popover', function () {
  	$('.popover').hide();
  });
  
  
  $('a.set-navbar').on('shown.bs.popover', function () {
  	$('.navbar-group').delegate('a','click',function(){
  		var navv = $(this).data('navbar');
		$('.navbar-group').find('a.active').removeClass('active');
		$(this).addClass('active');
		$.ajax({
	  		type:'POST',
	  		url:rooturl,
	  		data:{
	  			r:raccount,
	  			_themePage:'ajax/loadtheme',
	  			navbar:navv
	  		},
	  		success:function(data) {
		  		$('header>div').removeClass().attr('class','navbar navbar-fixed-top navbar-'+navv);
	  		}
	  	});
	});
  });
  
  $('a.set-theme').on('hidden.bs.popover', function () {
  	$('.popover').hide();
  });
  
  $('a.set-theme').on('shown.bs.popover', function () {
  	$('.theme-group').delegate('a','click',function(){
		$('.theme-group').find('a.active').removeClass('active');
		$(this).addClass('active');
		$("LINK[href*='theme.css']").remove();
		$("head").append("<link>");
		var css = $("head").children(":last");
		css.attr({
			rel:  "stylesheet",
		    type: "text/css",
		    href: rooturl+"/layouts/wizes/_theme/"+$(this).data('loadtheme')+"/theme.css"
		});
		$.ajax({
	  		type:'POST',
	  		url:rooturl,
	  		data:{
	  			r:raccount,
	  			_themePage:'ajax/loadtheme',
	  			theme:$(this).data('loadtheme')
	  		},
	  		success:function(data) {
		  		$("head").append("<link>");
				var css = $("head").children(":last");
				css.attr({
					rel:  "stylesheet",
				    type: "text/css",
				    href: rooturl+"/layouts/wizes/_lib/bootstrap-carousel.css"
				});
	  		}
	  	});
	});
  });
  
  $('a.set-theme').on('hidden.bs.popover', function () {
  	$('.popover').hide();
  });
  
  $('.iconbar-horizontal li').delegate('a.initele','click',function(){
	 if(confirm('정말 초기화 하시겠습니까?\n초기화 이후에는 복구할 수 없습니다.')) {
	 	$.ajax({
	  		type:'POST',
	  		url:rooturl,
	  		data:{
	  			r:raccount,
	  			_themePage:'ajax/removepageele',
	  			page:$('#wizes').data('page'),
	  		},
	  		success:function(data) {
		  		$('#wizes .container .row .sortable').empty();
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
	  $(this).callsetele('m');
  });
  
  
  
  $.fn.removelement = function() {
     $(this).delegate('a.remove-element','click',function(){
	 	$(this).closest('.element').remove();
	 });
  };
  
  $.fn.retriveset = function() {
     $(this).delegate('a.setting-element','click',function(){
     	$(this).closest('.element').addClass('Eedit');
	 	$(this).callsetele('m');
	 });
  };
  
  $.fn.callsetele = function(t) {
  	 $('#myModal h4.modal-title').text(decodeURI($(this).data('title'))+' 설정');
	 $('#myModal').data('element',$(this).data('element')).modal('show');
     $.ajax({
  		type:'POST',
  		url:rooturl,
  		data:{
  			r:raccount,
  			_element:$(this).data('element')+'_set',
  			_eletype:$(this).data('element'),
  			_eletitle:$(this).data('title'),
  			_eleuid:$(this).closest('.element').data('uid'),
  			_eled_regis: $(this).data('d_regis'),
  			edit:t
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
	    	var value = stripslashes(value);
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
  		async:false,
  		data:{
  			r:raccount,
  			_themePage:'ajax/saveelement',
  			uid:$(this).data('uid'),
  			page:$('#wizes').data('page'),
  			value: encodeURIComponent(JSON.stringify($(this).datattr())),
  			d_regis: $(this).data('d_regis'),
  			edit:t
  		},
  		success: function(result){
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
  			r:raccount,
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
	  			$('#wizes .container .row .sortable:last').append($result);	
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
	  		sequence.push($(this).data('uid'));				  	
	  	});
	  	$.ajax({
	  		type:'POST',
	  		url:rooturl,
	  		data:{
	  			r:raccount,
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

function stripslashes (str) {
  return (str + '').replace(/\\(.?)/g, function (s, n1) {
    switch (n1) {
    case '\\':
      return '\\';
    case '0':
      return '\u0000';
    case '':
      return '';
    default:
      return n1;
    }
  });
}