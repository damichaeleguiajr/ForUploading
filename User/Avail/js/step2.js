$('#numberguest').keypress(function(){
	if ( event.keyCode == 46 || event.keyCode == 8) {
            // let it happen, don't do anything
           
        } else {
            // Ensure that it is a number and stop the keypress
            if ((event.keyCode !==9) && (event.keyCode < 48 || event.keyCode > 57 )) {
                event.preventDefault(); 
            }   
                else{
                 
              if($.trim($(this).val()) =='')
            {
                if(event.keyCode == 48){
                event.preventDefault(); 
                }
            }
                    
            }
        }
});
$('#numberguest').keyup(function(){
	var value = $(this).val();
	$(this).attr('originalvalue', value);
	if(!isNaN(value)){
		$('#checkkids').show('slide' , { direction:'up' } , 300);
	}
	if(value == ''){
		$('#checkkids').hide('slide' , { direction:'up' } , 300);
	}
});
$('#kids').change(function(){
	if((this).checked) {
		$('#numberguest').attr('readonly',true);
		$('#numberkids').val('');
		$('#forkids').show('slide' , { direction:'up' } , 500);
		$('#numberkids').on('keyup',function(){
			var original = $('#numberguest').attr('originalvalue');
			var kids = $(this).val();
			var guest = parseInt(original) - parseInt(kids);
			if(!isNaN(guest)){
				$('#numberguest').val(guest);
			} else {
				$('#numberguest').val(original);
			}
		});
	} else {
		$('#forkids').hide('slide' , { direction:'up' } , 500);
		$('#numberguest').attr('readonly',false);
		var original = $('#numberguest').attr('originalvalue');
		$('#numberguest').val(original);
	}
});
var category = $('.category');
for( i = 0; category.length > i ; i++){
	$(category[i]).change(function(){
		var id = $(this).attr('for');
		if((this).checked){
			var mydiv = $('#'+id);
			mydiv.show('slide' , { direction:'up' } , 500);
			$('.category').prop('required',false);
		} else {
			var mydiv = $('#'+id);
			mydiv.hide('slide' , { direction:'up' } , 500);
			$('.category').prop('required',true);
		}
	});
}
var item = $('.item');
for( i = 0; item.length > i; i++){
	$(item[i]).change(function(){
		var id = $(this).attr('id');
		if((this).checked){
			$('.proceed').prop('disabled',false);
		} else {
			
		}
	});;
}