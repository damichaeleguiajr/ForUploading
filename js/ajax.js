//Budgetpackages
$('#budgetamount').keypress(function(){
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
$('.budgetselect').click(function(){
    var selectedpackage = $(this).attr('value');
    var priceremain = $(this).attr('price');
    var budgetamount = $('#budgetamount').val();
    var remaining = budgetamount-priceremain;
    (function(){
                var myDiv = document.getElementById("budgetload");
                var show = function(){
                $('#budgettable').attr('class','hide');
                $('#forbutton').attr('class','hide');
                myDiv.setAttribute("class", "form-group");
                setTimeout(hide, 800);  // 5 seconds
                }
                var hide = function(){
                $.post('budgetpackage.php',{ packageid:selectedpackage },function(data){
                    myDiv.setAttribute("class", "hide");
                    $('#budgetselected').html(data);
                    $('.totalbudget').attr("value", budgetamount);
                    $('.remainingbudget').val(remaining);
                });
                }
                show();
            })();
});
$('.budgetcreate').click(function(){
    var budgetamount = $('#budgetamount').val();
    (function(){
             var myDiv = document.getElementById("budgetload");
             var show = function(){
             $('#budgettable').attr('class','hide');
             $('#forbutton').attr('class','hide');
             myDiv.setAttribute("class", "form-group");
             setTimeout(hide, 800);  // 5 seconds
             }
             var hide = function(){
                var nothing = 'nothing';
                $.post('budgetpackage.php',{ nothing:nothing },function(data){
                    myDiv.setAttribute("class", "hide");
                    $('#budgetselected').html(data);
                    $('.totalbudget').attr("value", budgetamount);
                    $('.remainingbudget').val(budgetamount);
                });
            }
        show();
    })();
});
//Recommendedpackages
$('.recommendedpackageselect').click(function(){
    var selectedpackage = $(this).attr('value');
    (function(){
                var myDiv = document.getElementById("recommendedload");
                var show = function(){
                $('#recommended-table').attr('class','hide');
                $('.recommendedcreate').attr('class','hide');
                myDiv.setAttribute("class", "form-group");
                setTimeout(hide, 800);  // 5 seconds
                }
                var hide = function(){
                $.post('selectedpackage.php',{ packageid:selectedpackage },function(data){
                    myDiv.setAttribute("class", "hide");
                    $('#recommendedselect').html(data);
                });
                }
                show();
            })();
});
$('.recommendedcreate').click(function(){
    (function(){
             var myDiv = document.getElementById("recommendedload");
             var show = function(){
             $('#recommended-table').attr('class','hide');
             myDiv.setAttribute("class", "form-group");
             setTimeout(hide, 800);  // 5 seconds
             }
             var hide = function(){
                var nothing = 'nothing';
                $.post('selectedpackage.php',{ nothing:nothing },function(data){
                    myDiv.setAttribute("class", "hide");
                    myDiv.setAttribute("class", "hide");
                    $('#recommendedselect').html(data);
                });
            }
        show();
        deleter();
    })();
});
//Allpackages
$('.forselect').click(function(){
	var selectedpackage = $(this).attr('value');
    (function(){
                var show = function(){
                setTimeout(hide, 800);  // 5 seconds
                }
                var hide = function(){
                $.post('selectedpackage.php',{ packageid:selectedpackage },function(data){
                    $('#allpackageselect').html(data);
                });
                }
                show();
            })();
});
$('.forcreate').click(function(){
    (function(){
             var myDiv = document.getElementById("allpackageload");
             var show = function(){
             $('#table-hide').attr('class','hide');
             myDiv.setAttribute("class", "form-group");
             setTimeout(hide, 800);  // 5 seconds
             }
             var hide = function(){
                var nothing = 'nothing';
                $.post('selectedpackage.php',{ nothing:nothing },function(data){
                    myDiv.setAttribute("class", "hide");
                    myDiv.setAttribute("class", "hide");
                    $('#allpackageselect').html(data);
                });
            }
        show();
        deleter();
    })();
});
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
                $('.totalthisnow').val(fixed);
            }else{
                $('.totalthisnow').val(forSum);
            }
        });
        if($('.totalthisnow').val() < 500){
            $('.proceed').prop('disabled',true);
        } else {
            $('.proceed').prop('disabled',false);
        }
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
            $('input[id='+countName+']').val(newTotal*priceName);
            $('input[id='+countName+']').attr('value',newTotal*priceName);
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
        if($('.totalthisnow').val() > 500){
            $('.proceed').prop('disabled',false);
        } else {
            $('.proceed').prop('disabled',true);
        }
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
            $('input[id='+countName+']').val(newTotal*priceName);
            $('input[id='+countName+']').attr('value',newTotal*priceName);
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
        if($('.totalthisnow').val() < 500){
            $('.proceed').prop('disabled',true);
        } else {
            $('.proceed').prop('disabled',false);
        }
    });
     	
   $("#thisAddItem").on("click","button.forAddNow", function(g) {
        g.preventDefault();
        
        $('#myModalAdd').one("click","button.forAddContent", function(){
        var content = $(this).attr('id');
        var idNow = $(this).attr('forID');
        var origprice = $('.iLoveCode').attr("sameprice");
        var forFieldId = $(this).attr('forField');
        var forCountId = $(this).attr('forCount');
        var forEqualId = parseInt($(this).attr('idPrice'));
        var itemID = $('tr[blinked='+idNow+']').attr('id');
        var countChild = parseInt($('#packageTable tr:last-child').attr('id'));
        var checkChild = $('tr[id='+countChild+']').attr('id');
        if(checkChild){
            var countChild = countChild+1;
                if(itemID){
                        alert("Already in the list.\nPlease choose another item.")
                        $('tr[blinked='+idNow+']').delay(500).fadeOut().fadeIn('slow');
                        $('#myModalAdd').modal('hide');
                } else {
                    $('#packageTable tbody').append('<tr id="'+countChild+'" blinked="'+idNow+'">'+'<td><input class="asd search" name="itemname[]" type="text" value="'+content+'" forChange="'+idNow+'" readonly></td>'+
                                                    '<td width="40%" class="centerthis"><input type="button" value="-" class="qtyminus maxwell fa fa-minus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"> <input type="text" maxlength="3" value="1" class="qty" name="itemquantity[]" id="'+forFieldId+'" equal="'+forEqualId+'" field="'+forFieldId+'" count="'+forCountId+'" forChangeIdInput="'+countChild+'"> <input type="button" value="+" class="qtyplus maxwell fa fa-plus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"></td>'+
                                                    '<td class="centerthis"><span>₱</span><input class="asd" size="4" value="'+forEqualId+'" id="'+countChild+'" priceChange="" readonly></td>'+
                                                    '<td class="centerthis" width="30%"><span>₱</span><input class="thisisprice qty1 asd" name="itemprice[]" value="'+forEqualId+'" id="'+forCountId+'" forPriceInput="'+idNow+'" readonly disabled></td>'+
                                                    '<td class="centerthis" width="30%"><button type="button" priceTag="'+idNow+'" searchfor="'+idNow+'" id="'+countChild+'" class="btn btn-success modalnow" data-toggle="modal" data-target="#myModal"><span class="fa fa-edit"></span></button> <button type="button" class="btn btn-danger deleteme"><span class="fa fa-trash-o"></span></button></td>'
                                                    +'</tr>');
                    var forSum = 0;
                    $('.qty1').each(function(){
                        forSum += Number($(this).val().match(/\d+/));
                        var allResult = $('.totalthisnow').val(forSum);
                    });
                    $('#myModalAdd').modal('hide');
                }
        } else {
                    $('#packageTable tbody').append('<tr id="'+countChild+'" blinked="'+idNow+'">'+'<td><input class="asd search" name="itemname[]" type="text" value="'+content+'" forChange="'+idNow+'" readonly></td>'+
                                                    '<td width="40%" class="centerthis"><input type="button" value="-" class="qtyminus maxwell fa fa-minus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"> <input type="text" maxlength="3" value="1" class="qty" name="itemquantity[]" id="'+forFieldId+'" equal="'+forEqualId+'" field="'+forFieldId+'" count="'+forCountId+'" forChangeIdInput="'+countChild+'"> <input type="button" value="+" class="qtyplus maxwell fa fa-plus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"></td>'+
                                                    '<td class="centerthis"><span>₱</span><input class="asd" size="4" value="'+forEqualId+'" id="'+countChild+'" priceChange="" readonly></td>'+
                                                    '<td class="centerthis" width="30%"><span>₱</span><input class="thisisprice qty1 asd" name="itemprice[]" value="'+forEqualId+'" id="'+forCountId+'" forPriceInput="'+idNow+'" readonly disabled></td>'+
                                                    '<td class="centerthis" width="30%"><button type="button" priceTag="'+idNow+'" searchfor="'+idNow+'" id="'+countChild+'" class="btn btn-success modalnow" data-toggle="modal" data-target="#myModal"><span class="fa fa-edit"></span></button> <button type="button" class="btn btn-danger deleteme"><span class="fa fa-trash-o"></span></button></td>'
                                                    +'</tr>');
                    var forSum = 0;
                    $('.qty1').each(function(){
                        forSum += Number($(this).val().match(/\d+/));
                        var allResult = $('.totalthisnow').val(forSum);
                    });
                    $('#myModalAdd').modal('hide');
                    $('#dis').removeAttr('disabled');
        }
        if($('.totalthisnow').val() > 500){
            $('.proceed').prop('disabled',false);
        } else {
            $('.proceed').prop('disabled',true);
        }
        });
   });
$("#packageTable").on("click","button.modalnow", function() {
        var rowNum = $(this).attr('id');
        var getContent = $(this).attr('searchfor');
        var priceTag = $(this).attr('priceTag');
            // Selecting Item
            $('#myModal').one("click","button.forChangeContent",function(){
                var selectChange = $(this).attr('forID');
                var changingValue = $(this).attr('id');
                var idPrice = $(this).attr('idPrice');
                var checkMe = $('input[forChange='+selectChange+']');
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
                    $('input[forChangeIdInput='+rowNum+']').val(1);
                    $('#myModal').modal('hide');
                }
                 var forSum = 0;
                $('.qty1').each(function() {
                    $('#epalang').delay(1000).fadeOut().fadeIn('slow').stop();
                    forSum += Number($(this).val().match(/\d+/));
                    $('.totalthisnow').val(forSum);
                });
                if($('.totalthisnow').val() > 500){
                $('.proceed').prop('disabled',false);
                } else {
                    $('.proceed').prop('disabled',true);
                }
            });
    });
    $("#packageTable").on("click","button.deleteme", function() {
    var countTR = $('#packageTable tr').length;
     $(this).parent().parent().remove();   
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
        if($('.totalthisnow').val() < 500){
            $('.proceed').prop('disabled',true);
        } else {
            $('.proceed').prop('disabled',false);
        }
    });
   });

