$(document).ready(function(){
$("#packageTable").on("keyup","input.qty", function() {
        alert('thissss');
		var ekbPrice = parseInt($(this).attr('equal'));//price
		var QTYvalue = parseInt($(this).val());
		var selfID = $(this).attr('count');
        $(this).attr('value', QTYvalue);
		var totalQTY = ekbPrice * QTYvalue;
		if (!isNaN(QTYvalue)) {
            // Increment
            $('input[id='+selfID+']').val(totalQTY);
        } else {
        	$('input[id='+selfID+']').val("0");
        }
        var forSum = 0;
        $('.qty1').each(function() {
            forSum += Number($(this).val().match(/\d+/));
            var fixed = $('.iLoveCode').attr("iLoveCode");
            var recentPrice = $('.iLoveCode').attr("sameprice");
            if(forSum == recentPrice){
                $('.totalthisnow').val(fixed).stop();
            }else{
                $('.totalthisnow').val(forSum).stop();
            }
        });
	});
});