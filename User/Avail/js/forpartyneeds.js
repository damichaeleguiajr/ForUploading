$('#Table').change(function(){
	if((this).checked){
		var ok = ok;
		$.post('partyneeds.php', { ok:ok },function(data){
			$('#sample').html(data);
		});
	}
});