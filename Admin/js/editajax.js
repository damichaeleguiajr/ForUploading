$(document).ready(function(t){
	var forSum = $('.iLoveCode').attr("iLoveCode");
        $('.totalthisnow').attr("value", forSum);
	$('.qty').keypress(function(){
		return event.charCode >= 48 && event.charCode <= 57;
	});
	    $("#packageTable").on("keyup","input.qty", function(e) {
		var ekbPrice = parseInt($(this).attr('equal'));//price
		var QTYvalue = parseInt($(this).val());
		var selfID = $(this).attr('count');
        $(this).attr('value', QTYvalue);
		var totalQTY = accounting.formatMoney(ekbPrice * QTYvalue);
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
                $('.totalthisnow').val(fixed);
            }else{
                $('.totalthisnow').val(forSum);
            }
        });
	});
    $("#packageTable").on("click","input.fa-plus", function(e) {
		
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        countName = $(this).attr('count');
        priceName = parseInt($(this).attr('equal'));
        // Get its current value
        var currentVal = parseInt($('input[id='+fieldName+']').val());

        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[id='+fieldName+']').val(currentVal + 1);
            var newTotal = $('input[id='+fieldName+']').val();
            formatt = accounting.formatMoney(newTotal*priceName);
            $('input[id='+countName+']').val(formatt);
            $('input[id='+countName+']').attr('value',formatt);
            var presyo = $('input[id='+countName+']').val().match(/\d+/);

        } else {
            // Otherwise put a 0 there
            $('input[id='+fieldName+']').val(1);
        }
        var forSum = 0;
        $('.qty1').each(function() {
            forSum += Number($(this).val().match(/\d+/));
            var fixed = $('.iLoveCode').attr("iLoveCode");
            var recentPrice = $('.iLoveCode').attr("sameprice");
            if(forSum == recentPrice){
                $('.totalthisnow').val(fixed);
            }else{
                $('.totalthisnow').val(forSum);
            }
        });

    });
    // This button will decrement the value till 0
    $("#packageTable").on("click","input.fa-minus", function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        countName = $(this).attr('count');
        priceName = parseInt($(this).attr('equal'));
        // Get its current value
        var currentVal = parseInt($('input[id='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 1) {
            // Decrement one
            $('input[id='+fieldName+']').val(currentVal - 1);
            var newTotal = $('input[id='+fieldName+']').val();
            formatt = accounting.formatMoney(newTotal*priceName);
            $('input[id='+countName+']').val(formatt);
            $('input[id='+countName+']').attr('value',formatt);
        }
        var forSum = 0;
        $('.qty1').each(function() {
            forSum += Number($(this).val().match(/\d+/));
            var fixed = $('.iLoveCode').attr("iLoveCode");
            var recentPrice = $('.iLoveCode').attr("sameprice");
            if(forSum == recentPrice){
                $('.totalthisnow').val(fixed);
            }else{
                $('.totalthisnow').val(forSum);
            }
        });
    });
});