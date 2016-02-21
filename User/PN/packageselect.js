$('.customize').click(function(c){
	c.preventDefault();
	var selectedpackage = $(this).attr('id');
	$('#allpackageselect').hide();
	$('#fullpage').hide();
	function show(){
		$('#loading').show();
		setTimeout(hide,800);
	}
	function hide(){
		$('#loading').hide();
	    $.post('customize.php',{ packageid:selectedpackage },function(data){
	        $('#customizepackage').html(data);
	    });
		$('#customizepackage').show();
	}
	show();
	$('html, body').animate({ scrollTop: $('#tofocus').offset().top }, 'slow');
});
$('.forselect').click(function(p){
	p.preventDefault();
	var selectedpackage = $(this).attr('value');
	$('#budgeting').hide('slide', { direction:'left' }, 400);
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
$('.cancelcustomize').click(function(c){
	c.preventDefault();
	var x = confirm('Are you sure you want to cancel customizing?');
	if(x==true){
		$('#customizepackage').hide();
		function show(){
			$('#loading').show();
			setTimeout(hide,800);
		}
		function hide(){
			$('#loading').hide();
			$('#allpackageselect').show();
			$('#fullpage').show();
		}
		show();
		$('html, body').animate({ scrollTop: $('#tofocus').offset().top }, 'slow');
	}
});
$('#packageTable').on('keypress','input.qty',function(){
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
$('#packageTable').on('keyup','input.qty',function(){
	var ekbPrice = parseInt($(this).attr('equal'));//price
	var QTYvalue = parseInt($(this).val());
	var selfID = $(this).attr('count');
    $(this).attr('value', QTYvalue);
	var totalQTY = ekbPrice * QTYvalue;
	
	if (!isNaN(QTYvalue)) {
        // Increment
        if(QTYvalue >= '30'){
        	discount = (totalQTY * 0.05);
        	discounted = (totalQTY - discount);
        	rounded = (Math.round(discounted));
        	$('input[id='+selfID+']').val(rounded);
        	$('span[count='+selfID+']').show();
        	$('span[display='+selfID+']').hide();
        	$('span[color='+selfID+']').css("color","green");
        } else {
        	$('input[id='+selfID+']').val(totalQTY);
        	$('span[display='+selfID+']').show();
        	$('span[count='+selfID+']').hide();
        	$('span[color='+selfID+']').css("color","");
        }

    } else {
       	$('input[id='+selfID+']').val("0");
    }
    var forSum = 0;
    $('.qty1').each(function() {
        forSum += Number($(this).val().match(/\d+/));
        var fixed = $('.iLoveCode').attr("iLoveCode");
        var recentPrice = $('.iLoveCode').attr("sameprice");
        var originalround = accounting.formatMoney(forSum);
        $('.originalvalue').val(originalround);
        rounded = accounting.formatMoney(forSum);
        $('.totalthisnow').val(rounded);
    });
});
$('#packageTable').on('click','input.qtyplus',function(e){
    // Get the field name
    e.preventDefault();
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
        $('input[id='+countName+']').val(newTotal*priceName);
        $('input[id='+countName+']').attr('value',newTotal*priceName);
        var presyo = $('input[id='+countName+']').val().match(/\d+/);
        if(parseInt(newTotal) >= '30'){
        	value = (newTotal * priceName);
        	discount = (value * 0.05);
        	discounted = (value - discount);
        	rounded = (Math.round(discounted));
        	$('input[id='+countName+']').val(rounded);
        	$('input[id='+countName+']').attr('value',rounded);
        	$('span[count='+countName+']').show();
        	$('span[display='+countName+']').hide();
        	$('span[color='+countName+']').css("color","green");
        } else {
        	$('span[display='+countName+']').show();
        	$('span[count='+countName+']').hide();
        	$('span[color='+countName+']').css("color","");
        }
    } else {
        // Otherwise put a 0 there
        $('input[id='+fieldName+']').val(1);
    }
    var forSum = 0;
    $('.qty1').each(function() {
        forSum += Number($(this).val().match(/\d+/));
        var fixed = $('.iLoveCode').attr("iLoveCode");
        var recentPrice = $('.iLoveCode').attr("sameprice");
        var originalround = accounting.formatMoney(forSum);
        $('.originalvalue').val(originalround);
        rounded = accounting.formatMoney(forSum);
        $('.totalthisnow').val(rounded);
    });
});
$('#packageTable').on('click','input.qtyminus',function(f){
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
        $('input[id='+countName+']').val(newTotal*priceName);
        $('input[id='+countName+']').attr('value',newTotal*priceName);
        if(parseInt(newTotal) >= '30'){
        	value = (newTotal * priceName);
        	discount = (value * 0.05);
        	discounted = (value - discount);
        	rounded = (Math.round(discounted));
        	$('input[id='+countName+']').val(rounded);
        	$('input[id='+countName+']').attr('value',rounded);
        	$('span[count='+countName+']').show();
        	$('span[display='+countName+']').hide();
        	$('span[color='+countName+']').css("color","green");
        } else {
        	$('span[display='+countName+']').show();
        	$('span[count='+countName+']').hide();
        	$('span[color='+countName+']').css("color","");
        }
    }
    var forSum = 0;
    $('.qty1').each(function() {
        forSum += Number($(this).val().match(/\d+/));
        var fixed = $('.iLoveCode').attr("iLoveCode");
        var recentPrice = $('.iLoveCode').attr("sameprice");
        var originalround = accounting.formatMoney(forSum);
        $('.originalvalue').val(originalround);
        rounded = accounting.formatMoney(forSum);
        $('.totalthisnow').val(rounded);
    });
});
$('.qty').each(function() {
	var tocheck = $(this).attr('count');
	var tovalue = parseInt($(this).val());
	if(tovalue >= '30'){
		value = parseInt($('input[id='+tocheck+']').val());
		discount = (value * 0.05);
		discounted = (value - discount);
		rounded = (Math.round(discounted));
		$('input[id='+tocheck+']').val(rounded);
		$('input[id='+tocheck+']').attr('value',rounded);
		$('span[display='+tocheck+']').hide();
		$('span[count='+tocheck+']').show();
		$('span[color='+tocheck+']').css("color","green");
	}
});
$("#packageTable").on("click","button.deleteme", function() {
	var countTR = $('#packageTable tr').length;
	$(this).parent().parent().remove();
	var forSum = 0;
    $('.qty1').each(function() {
        forSum += Number($(this).val().match(/\d+/));
        var fixed = $('.iLoveCode').attr("iLoveCode");
        var recentPrice = $('.iLoveCode').attr("sameprice");
        var originalround = accounting.formatMoney(forSum);
        $('.originalvalue').val(originalround);
        rounded = accounting.formatMoney(forSum);
        $('.totalthisnow').val(rounded);
    });
    if(countTR == '2'){
    	$('.totalthisnow').val(0);
    }
})
$('#myModalAdd').on("click","button.forAddContent", function(){
	var content = $(this).attr('id');
    var idNow = $(this).attr('forID');
    var origprice = $('.iLoveCode').attr("sameprice");
    var forFieldId = $(this).attr('forField');
    var forCountId = $(this).attr('forCount');
    var forEqualId = parseInt($(this).attr('idPrice'));
    var itemID = $('tr[blinked='+idNow+']').length;
    var countChild = parseInt($('#packageTable tr:last-child').attr('id'));
    var checkChild = $('tr[id='+countChild+']').attr('id');
    if(itemID >= '1'){
    	alert("Already in the list.\nPlease choose another item.");
    } else {
    	countChild = countChild+1;
     	$('#packageTable').append(
        	'<tr id="'+countChild+'" blinked="'+idNow+'">'+'<td><input class="asd search" name="itemname[]" type="text" value="'+content+'" forChange="'+idNow+'" readonly></td>'+
            '<td class="centerthis"><input type="button" value="-" class="qtyminus maxwell fa fa-minus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"> <input type="text" maxlength="3" value="1" class="qty" name="itemquantity[]" id="'+forFieldId+'" equal="'+forEqualId+'" field="'+forFieldId+'" count="'+forCountId+'" forChangeIdInput="'+countChild+'"> <input type="button" value="+" class="qtyplus maxwell fa fa-plus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"></td>'+
            '<td><span>₱</span><input class="asd" size="4" style="width:50%;display:inline" value="'+forEqualId+'" id="'+countChild+'" priceChange="'+idNow+'" readonly></td>'+
            '<td><span class="fa fa-check" style="display:none;color:green" count="'+forCountId+'"> 5%</span><span display="'+forCountId+'" style="color:red"><i>NONE</i></span>'+
            '<td class="centerthis"><span color="'+forCountId+'">₱<input class="thisisprice qty1 asd" name="itemprice[]" value="'+forEqualId+'" id="'+forCountId+'" forPriceInput="'+idNow+'" readonly></span></td>'+
            '<td class="centerthis"><button type="button" priceTag="'+idNow+'" searchfor="'+idNow+'" id="'+countChild+'" colordisplay="'+forCountId+'" class="btn btn-success modalnow" data-toggle="modal" data-target="#myModal"><span class="fa fa-edit"></span></button> <button type="button" class="btn btn-danger deleteme"><span class="fa fa-trash-o"></span></button></td>'
            +'</tr>'
        );
        var forSum = 0;
     	$('.qty1').each(function() {
	        forSum += Number($(this).val().match(/\d+/));
	        var fixed = $('.iLoveCode').attr("iLoveCode");
	        var recentPrice = $('.iLoveCode').attr("sameprice");
	        var originalround = accounting.formatMoney(forSum);
	        $('.originalvalue').val(originalround);
	        rounded = accounting.formatMoney(forSum);
	        $('.totalthisnow').val(rounded);
    	});
    }
});
$("#packageTable").on("click","button.modalnow", function() {
        var rowNum = $(this).attr('id');
        var getContent = $(this).attr('searchfor');
        var priceTag = $(this).attr('priceTag');
        var colordisplay = $(this).attr('colordisplay');
            // Selecting Item
            $('#myModal').one("click","button.forChangeContent",function(){
                var selectChange = $(this).attr('forID');
                var changingValue = $(this).attr('id');
                var idPrice = $(this).attr('idPrice');
                var checkMe = $('input[forChange='+selectChange+']');
                var colordisplaychange = $(this).attr('colordisplay');
                if(checkMe.length == 1){
                    alert("Already exist on the list.\nPlease choose another item.");
                    $('#myModal').modal('hide');
                } else {
                    $('input[forChange='+getContent+']').val(changingValue);
                    $('input[forChange='+getContent+']').attr('value',changingValue);
                    $('input[forChange='+getContent+']').attr('forChange',selectChange);
                    $('input[forPriceInput='+priceTag+']').val(idPrice);
                    $('input[forPriceInput='+priceTag+']').attr('value',idPrice);
                    $('input[forPriceInput='+priceTag+']').attr('forPriceInput',selectChange);
                    $('input[forChangeId='+rowNum+']').attr('equal', idPrice);
                    $('input[forChangeIdInput='+rowNum+']').attr('equal', idPrice);
                    $('button[id='+rowNum+']').attr('priceTag',selectChange);
                    $('button[id='+rowNum+']').attr('searchfor',selectChange);
                    $('input[id='+rowNum+']').attr('priceChange',selectChange);
                    $('input[id='+rowNum+']').attr('value',idPrice);
                    $('tr[blinked='+getContent+']').attr('blinked',selectChange);
                    $('input[forChangeIdInput='+rowNum+']').val(1);
                    $('span[count='+colordisplay+']').hide();
                    $('span[display='+colordisplay+']').show();
                    $('span[color='+colordisplay+']').css("color","");
                    $('#myModal').modal('hide');

                }
            });
        return true;
});