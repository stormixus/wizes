<script type="text/javascript">
	$(function(){
		$('select[name="bbsid"]').change(function(){
			var eleboardname = $(this).find('option:selected').data('elename');
			var eleboardlink = $(this).find('option:selected').data('eleblink');
			$('input[name="eletitle"]').val(eleboardname);
			$('input[name="link"]').val(eleboardlink);			
		});
		
		//called when key is pressed in textbox
		  $(".only_num").keypress(function (e) {
		  	if($(this).next(".errmsg").length<1) {
				$(this).after('&nbsp;<span class="errmsg"></span>'); 	
		  	}
		     //if the letter is not digit then display error and don't type anything
		     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		        //display error message
		        $(this).next(".errmsg").html("숫자만 쓰실 수 있습니다.").show().fadeOut("slow");
		               return false;
		    }
		   });
	})
</script>