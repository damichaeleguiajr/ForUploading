$('.forselect').click(function(p){
	p.preventDefault();
	var selectedpackage = $(this).attr('value');
	$.post('select.php',{ packageid:selectedpackage },function(data){
        $('#allpackageselect').html(data);
        $('#allpackageselect').show('slide', {direction:'left'}, 500);
    });
});
$('#sorting').change(function(){
	var value = $(this).val();
	if(value == 'pk_name'){
		$('.name').attr('class','scroll containspackages name');
		$('.price').attr('class','scroll containspackages hide price');
		$('.event').attr('class','scroll containspackages hide event');
	} if (value == 'pk_price'){
		$('.name').attr('class','scroll containspackages hide name');
		$('.price').attr('class','scroll containspackages price');
		$('.event').attr('class','scroll containspackages hide event');
	} if (value == 'pk_category'){
		$('.name').attr('class','scroll containspackages hide name');
		$('.price').attr('class','scroll containspackages hide price');
		$('.event').attr('class','scroll containspackages event');
	}
});