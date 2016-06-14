$(function(){
	d = new Array("name", "email", "phone","content");
	err= Array('Only letters and white space allowed', "Invalid email format", "Only numbers allowed", "Content is not allowed to be empty");
	re = Array( /\S+/, /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/, /^[0-9]*$/);
	
	$('#btn_send').click(function(e){
		//alert("Hoa");
		remove();		
		//$('#content').Validatr();		
		for (var i = 0; i < 3; i++) {
			if (($('#'+d[i]).val() != "")&& (!check($('#'+d[i]), re[i]))){
				$('#' + d[i]).after("<div class='alert alert-danger' id='error_" +d[i] +"'>"+err[i]+'!</div>');
				return false;	
			}
			
		}		
				
		//return false;
	});
	function remove(){
    	$('#error_name').fadeOut().remove();
    	$('#error_email').fadeOut().remove();
    	$('#error_phone').fadeOut().remove();
    	$('#error_content').fadeOut().remove();
    }
    function check(input, re){
		var is_smt = re.test(input.val());
		if(input.val() == "") return 0;
		return(is_smt);
	}

});
