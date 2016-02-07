$('#name').keyup(function(){
	var name = $('#name').val();
	$.post('sample1.php',{ name:name },function(data){
		$("#name_feedback").html(data);
	});
});