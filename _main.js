$(function(){
	if($('#sidepanel').html()) {
		$.getScript( rooturl+"/layouts/wizes/elejs/admin.js" );
		$.getScript( rooturl+"/layouts/wizes/elejs/jquery.sortable.js" );
	}
	
	//UI applications
	
    $(".tooltip").addClass(function() {
      if ($(this).prev().attr("data-tooltip-style")) {
        return "tooltip-" + $(this).prev().attr("data-tooltip-style");
      }
    });
})