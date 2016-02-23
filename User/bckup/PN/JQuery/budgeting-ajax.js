    $('#budgetme').click(function(){
			(function(){
                var myDiv = document.getElementById("fullload");
                var show = function(){
                $('.tabs-withoutbudget').attr("class", "tabs-without hide");
                $('#budgetme').attr("class","hide");
                myDiv.setAttribute("class", "form-group");
                setTimeout(hide, 800);  // 5 seconds
                }
                var hide = function(){
                $('.tabs-budget').attr("class", "tabs tabs-style-underline tabs-withbudget");
                myDiv.setAttribute("class", "hide");
                $('#enterbudget').attr("class", "col-lg-12");
                }
                show();
            })();
    });
    $('#cancelbudget').click(function(){
        (function(){
                var myDiv = document.getElementById("fullload");
                var show = function(){
                $('.tabs-withbudget').attr("class", "hide");
                $('#enterbudget').attr("class","hide");
                myDiv.setAttribute("class", "form-group");
                setTimeout(hide, 800);  // 5 seconds
                }
                var hide = function(){
                $('.tabs-without').attr("class", "tabs tabs-style-underline tabs-withoutbudget");
                $('#budgetme').attr("class", "btn btn-warning btn-lg");
                myDiv.setAttribute("class", "hide");
                }
                show();
            })();
    });
    $('#budgetamount').keyup(function(){
        var budgetamount = $('#budgetamount').val();
        $('.totalbudget').attr("value", budgetamount);
            var show = function(){
                $('#text').attr("class", "hide");
                setTimeout(hide, 200);  // 5 seconds
            }
            var hide = function(){
                $.post('budgeting.php',{ budget:budgetamount },function(data){
                    $('#budgettable').html(data);
                    $('#forbutton').attr("class", "row");
                });
            }
            show();
    });
    //Editing Buttons
    $('#budgetamount').keypress(function(){
        return event.charCode >= 48 && event.charCode <= 57;
    });
    var forSum = $('.iLoveCode').attr("iLoveCode");
    $('.totalthisnow').attr("value", forSum);
    $("#budgetTable").on("keypress","input.qty",function(){
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
    $("#budgetTable").on("keyup","input.qty", function() {
        var budgetamount = $('#budgetamount').val();
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
            $(this).focusout(function(){
            if($(this).val() == ""){
                $(this).val(1);
                $('input[id='+selfID+']').val(ekbPrice);
                var focuswala = parseInt($('.totalthisnow').val());
                $('.totalthisnow').val(focuswala+ekbPrice);
                var focuswalabudget = parseInt($('.remainingbudget').val());
                $('.remainingbudget').val(focuswalabudget-ekbPrice);
            }
        });
        }
        var forSum = 0;
        $('.qty1').each(function() {
            forSum += Number($(this).val().match(/\d+/));
            var remainingbudget = budgetamount-forSum;
            var fixed = $('.iLoveCode').attr("iLoveCode");
            var fixedbudget = budgetamount-fixed;
            var recentPrice = $('.iLoveCode').attr("sameprice");
            if(forSum == recentPrice){
                $('.totalthisnow').val(fixed);
                $('.remainingbudget').val(fixedbudget);
            }else{
                $('.totalthisnow').val(forSum);
                $('.remainingbudget').val(remainingbudget);
            }
        });
        if($('.totalthisnow').val() < 500){
            $('.proceed').prop('disabled',true);
        } else {
            $('.proceed').prop('disabled',false);
        }
    });
    $("#budgetTable").on("click","input.fa-plus", function(e) {
        var budgetamount = $('#budgetamount').val();
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
            var forSum = 0;
            $('.qty1').each(function() {
                forSum += Number($(this).val().match(/\d+/));
                var remainingbudget = budgetamount-forSum;
                var fixed = $('.iLoveCode').attr("iLoveCode");
                var fixedbudget = budgetamount-fixed;
                var recentPrice = $('.iLoveCode').attr("sameprice");
                $('.totalthisnow').val(forSum);
                $('.remainingbudget').val(remainingbudget);
                if(remainingbudget < 0){
                    var r = confirm('Not enough budget. Do you want to continue? Clicking "Ok" button will remove your budget and continue.');
                    if(r==true){
                        $('.fa-plus').attr('class','qtyplus maxwell fa fa-plus-semi');
                        $('#forremaining').attr("class","hide");
                        $('#fortotalbudget').attr("class","hide");
                    } else {
                        $('input[id='+fieldName+']').val(currentVal - 0);
                        var newTotal = $('input[id='+fieldName+']').val();
                        $('input[id='+countName+']').val(newTotal*priceName);
                        $('input[id='+countName+']').attr('value',newTotal*priceName);
                        $('.remainingbudget').val(remainingbudget+priceName);
                        $('.totalthisnow').val(forSum-priceName);
                    }
                } else {
                    if(forSum == recentPrice){
                        $('.totalthisnow').val(fixed);
                        $('.remainingbudget').val(fixedbudget);
                    } else {
                    $('.totalthisnow').val(forSum);
                        $('.remainingbudget').val(remainingbudget);
                    }
                }
                
            });
            
        } else {
            // Otherwise put a 0 there
            $('input[id='+fieldName+']').val(1);
        }
        if($('.totalthisnow').val() > 500){
            $('.proceed').prop('disabled',false);
        } else {
            $('.proceed').prop('disabled',true);
        }
    });
    $("#budgetTable").on("click","input.fa-plus-semi", function(e) {
        var budgetamount = $('#budgetamount').val();
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
            var forSum = 0;
            $('.qty1').each(function() {
                forSum += Number($(this).val().match(/\d+/));
                var remainingbudget = budgetamount-forSum;
                var fixed = $('.iLoveCode').attr("iLoveCode");
                var fixedbudget = budgetamount-fixed;
                var recentPrice = $('.iLoveCode').attr("sameprice");
                $('.totalthisnow').val(forSum);
                $('.remainingbudget').val(remainingbudget);
                if(forSum == recentPrice){
                    $('.totalthisnow').val(fixed);
                    $('.remainingbudget').val(fixedbudget);
                } else {
                    $('.totalthisnow').val(forSum);
                    $('.remainingbudget').val(remainingbudget);
                }
                
            });
            
        } else {
            // Otherwise put a 0 there
            $('input[id='+fieldName+']').val(1);
        }
        if($('.totalthisnow').val() > 500){
            $('.proceed').prop('disabled',false);
        } else {
            $('.proceed').prop('disabled',true);
        }
    });
    $("#budgetTable").on("click","input.fa-minus", function(e) {
        var budgetamount = $('#budgetamount').val();
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
            var remainingbudget = budgetamount-forSum;
            var fixed = $('.iLoveCode').attr("iLoveCode");
            var fixedbudget = budgetamount-fixed;
            var recentPrice = $('.iLoveCode').attr("sameprice");
            if(forSum == recentPrice){
                $('.totalthisnow').val(fixed);
                $('.remainingbudget').val(fixedbudget);
            }else{
                $('.totalthisnow').val(forSum);
                $('.remainingbudget').val(remainingbudget);
            }
        });
        if($('.totalthisnow').val() < 500){
            $('.proceed').prop('disabled',true);
        } else {
            $('.proceed').prop('disabled',false);
        }
    });
    $("#thisAddItem").on("click","button.forAddNow", function() {
        function alerto(){
            alert("Already in the list.\nPlease choose another item.");
            $('#myModalAdd').modal('hide');
            $('tr[blinked='+idNow+']').delay(500).fadeOut().fadeIn('slow');
        }
        var budgetamount = $('.remainingbudget').val();
        $('#myModalAdd').one("click","button.forAddContent", function(){
        var content = $(this).attr('id');
        var idNow = $(this).attr('forID');
        var origprice = $('.iLoveCode').attr("sameprice");
        var forFieldId = $(this).attr('forField');
        var forCountId = $(this).attr('forCount');
        var forEqualId = parseInt($(this).attr('idPrice'));
        var itemID = $('#budgetTable').find('tr[blinked='+idNow+']').attr('id');
        var countChild = parseInt($('#packageTable tr:last-child').attr('id'));
        var checkChild = $('tr[id='+countChild+']').attr('id');
        var remeyn = $('.remainingbudget').val();
        var remeyningbadyet = remeyn-forEqualId;
        if(checkChild){
            var countChild = countChild+1;
                if(itemID){
                    alerto();
                } else {
                    if(remeyningbadyet < 0){
                        var r = confirm('Not enough budget. Do you want to continue? Clicking "Ok" button will remove your budget and continue.');
                        if(r==true){
                                    $('#budgetTable tbody').append('<tr id="'+countChild+'" blinked="'+idNow+'">'+'<td><input class="asd search" name="itemname[]" type="text" value="'+content+'" forChange="'+idNow+'" readonly></td>'+
                                                            '<td width="40%" class="centerthis"><input type="button" value="-" class="qtyminus maxwell fa fa-minus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"> <input type="text" maxlength="3" value="1" class="qty" name="itemquantity[]" id="'+forFieldId+'" equal="'+forEqualId+'" field="'+forFieldId+'" count="'+forCountId+'" forChangeIdInput="'+countChild+'"> <input type="button" value="+" class="qtyplus maxwell fa fa-plus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"></td>'+
                                                            '<td class="centerthis"><span>₱</span><input class="asd" size="4" value="'+forEqualId+'" id="'+countChild+'" priceChange="" readonly></td>'+
                                                            '<td class="centerthis" width="30%"><span>₱</span><input class="thisisprice qty1 asd" name="itemprice[]" value="'+forEqualId+'" id="'+forCountId+'" forPriceInput="'+idNow+'" readonly disabled></td>'+
                                                            '<td class="centerthis" width="30%"><button type="button" priceTag="'+idNow+'" searchfor="'+idNow+'" id="'+countChild+'" class="btn btn-success modalnow" data-toggle="modal" data-target="#myModal"><span class="fa fa-edit"></span></button> <button type="button" class="btn btn-danger deleteme"><span class="fa fa-trash-o"></span></button></td>'
                                                            +'</tr>');
                            var forSum = 0;
                            $('.qty1').each(function(){
                                forSum += Number($(this).val().match(/\d+/));
                                $('.totalthisnow').val(forSum);
                                var allResult = $('.totalthisnow').val();
                                var allbudget = $('.totalbudget').val();
                                var remainingbudget = allbudget-allResult;
                                $('.remainingbudget').val(remainingbudget);
                            });
                            $('#myModalAdd').modal('hide');
                            $('.forAddContent').attr('class','btn-success btn forAddContent-semi');
                            $('#forremaining').attr("class","hide");
                            $('#fortotalbudget').attr("class","hide");
                        } else {
                            $('#myModalAdd').modal('hide');
                        }
                    } else {
                    $('#budgetTable tbody').append('<tr id="'+countChild+'" blinked="'+idNow+'">'+'<td><input class="asd search" name="itemname[]" type="text" value="'+content+'" forChange="'+idNow+'" readonly></td>'+
                                                    '<td width="40%" class="centerthis"><input type="button" value="-" class="qtyminus maxwell fa fa-minus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"> <input type="text" maxlength="3" value="1" class="qty" name="itemquantity[]" id="'+forFieldId+'" equal="'+forEqualId+'" field="'+forFieldId+'" count="'+forCountId+'" forChangeIdInput="'+countChild+'"> <input type="button" value="+" class="qtyplus maxwell fa fa-plus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"></td>'+
                                                    '<td class="centerthis"><span>₱</span><input class="asd" size="4" value="'+forEqualId+'" id="'+countChild+'" priceChange="" readonly></td>'+
                                                    '<td class="centerthis" width="30%"><span>₱</span><input class="thisisprice qty1 asd" name="itemprice[]" value="'+forEqualId+'" id="'+forCountId+'" forPriceInput="'+idNow+'" readonly disabled></td>'+
                                                    '<td class="centerthis" width="30%"><button type="button" priceTag="'+idNow+'" searchfor="'+idNow+'" id="'+countChild+'" class="btn btn-success modalnow" data-toggle="modal" data-target="#myModal"><span class="fa fa-edit"></span></button> <button type="button" class="btn btn-danger deleteme"><span class="fa fa-trash-o"></span></button></td>'
                                                    +'</tr>');
                    var forSum = 0;
                    $('.qty1').each(function(){
                        forSum += Number($(this).val().match(/\d+/));
                        $('.totalthisnow').val(forSum);
                        var allResult = $('.totalthisnow').val();
                        var allbudget = $('.totalbudget').val();
                        var remainingbudget = allbudget-allResult;
                        $('.remainingbudget').val(remainingbudget);
                    });
                    $('#myModalAdd').modal('hide');
                    }
                    
                }
        } else {
                    if(remeyningbadyet < 0){
                        var r = confirm('Not enough budget. Do you want to continue? Clicking "Ok" button will remove your budget and continue.');
                        if(r==true){
                                    $('#budgetTable tbody').append('<tr id="'+countChild+'" blinked="'+idNow+'">'+'<td><input class="asd search" name="itemname[]" type="text" value="'+content+'" forChange="'+idNow+'" readonly></td>'+
                                                            '<td width="40%" class="centerthis"><input type="button" value="-" class="qtyminus maxwell fa fa-minus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"> <input type="text" maxlength="3" value="1" class="qty" name="itemquantity[]" id="'+forFieldId+'" equal="'+forEqualId+'" field="'+forFieldId+'" count="'+forCountId+'" forChangeIdInput="'+countChild+'"> <input type="button" value="+" class="qtyplus maxwell fa fa-plus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"></td>'+
                                                            '<td class="centerthis"><span>₱</span><input class="asd" size="4" value="'+forEqualId+'" id="'+countChild+'" priceChange="" readonly></td>'+
                                                            '<td class="centerthis" width="30%"><span>₱</span><input class="thisisprice qty1 asd" name="itemprice[]" value="'+forEqualId+'" id="'+forCountId+'" forPriceInput="'+idNow+'" readonly disabled></td>'+
                                                            '<td class="centerthis" width="30%"><button type="button" priceTag="'+idNow+'" searchfor="'+idNow+'" id="'+countChild+'" class="btn btn-success modalnow" data-toggle="modal" data-target="#myModal"><span class="fa fa-edit"></span></button> <button type="button" class="btn btn-danger deleteme"><span class="fa fa-trash-o"></span></button></td>'
                                                            +'</tr>');
                            var forSum = 0;
                            $('.qty1').each(function(){
                                forSum += Number($(this).val().match(/\d+/));
                                $('.totalthisnow').val(forSum);
                                var allResult = $('.totalthisnow').val();
                                var allbudget = $('.totalbudget').val();
                                var remainingbudget = allbudget-allResult;
                                $('.remainingbudget').val(remainingbudget);
                            });
                            $('#myModalAdd').modal('hide');
                            $('.forAddContent').attr('class','btn-success btn forAddContent-semi');
                            $('#forremaining').attr("class","hide");
                            $('#fortotalbudget').attr("class","hide");
                        } else {
                            $('#myModalAdd').modal('hide');
                        }
                    }else {
                    $('#budgetTable tbody').append('<tr id="'+countChild+'" blinked="'+idNow+'">'+'<td><input class="asd search" name="itemname[]" type="text" value="'+content+'" forChange="'+idNow+'" readonly></td>'+
                                                    '<td width="40%" class="centerthis"><input type="button" value="-" class="qtyminus maxwell fa fa-minus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"> <input type="text" maxlength="3" value="1" class="qty" name="itemquantity[]" id="'+forFieldId+'" equal="'+forEqualId+'" field="'+forFieldId+'" count="'+forCountId+'" forChangeIdInput="'+countChild+'"> <input type="button" value="+" class="qtyplus maxwell fa fa-plus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"></td>'+
                                                    '<td class="centerthis"><span>₱</span><input class="asd" size="4" value="'+forEqualId+'" id="'+countChild+'" priceChange="" readonly></td>'+
                                                    '<td class="centerthis" width="30%"><span>₱</span><input class="thisisprice qty1 asd" name="itemprice[]" value="'+forEqualId+'" id="'+forCountId+'" forPriceInput="'+idNow+'" readonly disabled></td>'+
                                                    '<td class="centerthis" width="30%"><button type="button" priceTag="'+idNow+'" searchfor="'+idNow+'" id="'+countChild+'" class="btn btn-success modalnow" data-toggle="modal" data-target="#myModal"><span class="fa fa-edit"></span></button> <button type="button" class="btn btn-danger deleteme"><span class="fa fa-trash-o"></span></button></td>'
                                                    +'</tr>');
                    var forSum = 0;
                    $('.qty1').each(function(){
                        forSum += Number($(this).val().match(/\d+/));
                        $('.totalthisnow').val(forSum);
                        var allResult = $('.totalthisnow').val();
                        var allbudget = $('.totalbudget').val();
                        var remainingbudget = allbudget-allResult;
                        $('.remainingbudget').val(remainingbudget);
                    });
                    $('#myModalAdd').modal('hide');
                    }
        }
        });
        $('#myModalAdd').one("click","button.forAddContent-semi", function(){
        var content = $(this).attr('id');
        var idNow = $(this).attr('forID');
        var origprice = $('.iLoveCode').attr("sameprice");
        var forFieldId = $(this).attr('forField');
        var forCountId = $(this).attr('forCount');
        var forEqualId = parseInt($(this).attr('idPrice'));
        var itemID = $('#budgetTable').find('tr[blinked='+idNow+']').attr('id');
        var countChild = parseInt($('#packageTable tr:last-child').attr('id'));
        var checkChild = $('tr[id='+countChild+']').attr('id');
        if(checkChild){
            var countChild = countChild+1;
                if(itemID){
                    alerto();
                } else {
                    $('#budgetTable tbody').append('<tr id="'+countChild+'" blinked="'+idNow+'">'+'<td><input class="asd search" name="itemname[]" type="text" value="'+content+'" forChange="'+idNow+'" readonly></td>'+
                                                    '<td width="40%" class="centerthis"><input type="button" value="-" class="qtyminus maxwell fa fa-minus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"> <input type="text" maxlength="3" value="1" class="qty" name="itemquantity[]" id="'+forFieldId+'" equal="'+forEqualId+'" field="'+forFieldId+'" count="'+forCountId+'" forChangeIdInput="'+countChild+'"> <input type="button" value="+" class="qtyplus maxwell fa fa-plus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"></td>'+
                                                    '<td class="centerthis"><span>₱</span><input class="asd" size="4" value="'+forEqualId+'" id="'+countChild+'" priceChange="" readonly></td>'+
                                                    '<td class="centerthis" width="30%"><span>₱</span><input class="thisisprice qty1 asd" name="itemprice[]" value="'+forEqualId+'" id="'+forCountId+'" forPriceInput="'+idNow+'" readonly disabled></td>'+
                                                    '<td class="centerthis" width="30%"><button type="button" priceTag="'+idNow+'" searchfor="'+idNow+'" id="'+countChild+'" class="btn btn-success modalnow" data-toggle="modal" data-target="#myModal"><span class="fa fa-edit"></span></button> <button type="button" class="btn btn-danger deleteme"><span class="fa fa-trash-o"></span></button></td>'
                                                    +'</tr>');
                    var forSum = 0;
                    $('.qty1').each(function(){
                        forSum += Number($(this).val().match(/\d+/));
                        $('.totalthisnow').val(forSum);
                        var allResult = $('.totalthisnow').val();
                        var allbudget = $('.totalbudget').val();
                        var remainingbudget = allbudget-allResult;
                        $('.remainingbudget').val(remainingbudget);
                    });
                    $('#myModalAdd').modal('hide');
                }
        } else {
                    $('#budgetTable tbody').append('<tr id="'+countChild+'" blinked="'+idNow+'">'+'<td><input class="asd search" name="itemname[]" type="text" value="'+content+'" forChange="'+idNow+'" readonly></td>'+
                                                    '<td width="40%" class="centerthis"><input type="button" value="-" class="qtyminus maxwell fa fa-minus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"> <input type="text" maxlength="3" value="1" class="qty" name="itemquantity[]" id="'+forFieldId+'" equal="'+forEqualId+'" field="'+forFieldId+'" count="'+forCountId+'" forChangeIdInput="'+countChild+'"> <input type="button" value="+" class="qtyplus maxwell fa fa-plus" field="'+forFieldId+'" count="'+forCountId+'" equal="'+forEqualId+'" forChangeId="'+countChild+'"></td>'+
                                                    '<td class="centerthis"><span>₱</span><input class="asd" size="4" value="'+forEqualId+'" id="'+countChild+'" priceChange="" readonly></td>'+
                                                    '<td class="centerthis" width="30%"><span>₱</span><input class="thisisprice qty1 asd" name="itemprice[]" value="'+forEqualId+'" id="'+forCountId+'" forPriceInput="'+idNow+'" readonly disabled></td>'+
                                                    '<td class="centerthis" width="30%"><button type="button" priceTag="'+idNow+'" searchfor="'+idNow+'" id="'+countChild+'" class="btn btn-success modalnow" data-toggle="modal" data-target="#myModal"><span class="fa fa-edit"></span></button> <button type="button" class="btn btn-danger deleteme"><span class="fa fa-trash-o"></span></button></td>'
                                                    +'</tr>');
                    var forSum = 0;
                    $('.qty1').each(function(){
                        forSum += Number($(this).val().match(/\d+/));
                        $('.totalthisnow').val(forSum);
                        var allResult = $('.totalthisnow').val();
                        var allbudget = $('.totalbudget').val();
                        var remainingbudget = allbudget-allResult;
                        $('.remainingbudget').val(remainingbudget);
                    });
                    $('#myModalAdd').modal('hide');
                    $('#dis').removeAttr('disabled');
        }
        });
    });
    $("#budgetTable").on("click","button.modalnow", function(event) {
        function alertpagmeron(){
            window.alert("Already exist on the list.\nPlease choose another item.");
            $('#myModal').modal('hide');
        }
        var budgetamount = $('#budgetamount').val();
        var rowNum = $(this).attr('id');
        var getContent = $(this).attr('searchfor');
        var priceTag = $(this).attr('priceTag');
        var presyopapalitan = parseInt($(this).attr('item'));
            // Selecting Item
            $('#myModal').one("click","button.forChangeContent",function(){
                var selectChange = $(this).attr('forID');
                var changingValue = $(this).attr('id');
                var idPrice = $(this).attr('idPrice');
                var checkMe = $("#budgetTable").find('input[forChange='+selectChange+']');
                budgetcheck = parseInt($('#remainingbudget').val());
                alert(budgetcheck);
                if(checkMe.length == 1){
                    alertpagmeron();
                } else {
                    if(badyeting < 0){
                        var r = confirm('Not enough budget. Do you want to continue? Clicking "Ok" button will remove your budget and continue.');
                        if(r == true){
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
                            $('button[id='+rowNum+']').attr('item',idPrice);
                            $('input[id='+rowNum+']').attr('priceChange',selectChange);
                            $('input[id='+rowNum+']').attr('value',idPrice);
                            $('input[forChangeIdInput='+rowNum+']').val(1);
                            $('#myModal').modal('hide');
                            var forSum = 0;
                            $('.qty1').each(function() {
                                forSum += Number($(this).val().match(/\d+/));
                                $('.totalthisnow').val(forSum);
                                var allResult = $('.totalthisnow').val();
                                var allbudget = $('.totalbudget').val();
                            });
                            $('#fortotalbudget').attr('class','hide');
                            $('#forremaining').attr('class','hide');
                            $('.modalnow').attr("class","btn btn-success modalnow1");
                        } else {
                            $('#myModal').modal('hide');
                        }
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
                            $('button[id='+rowNum+']').attr('item',idPrice);
                            $('input[id='+rowNum+']').attr('priceChange',selectChange);
                            $('input[id='+rowNum+']').attr('value',idPrice);
                            $('input[forChangeIdInput='+rowNum+']').val(1);
                            $('#myModal').modal('hide');
                            var forSum = 0;
                            $('.qty1').each(function() {
                                forSum += Number($(this).val().match(/\d+/));
                                $('.totalthisnow').val(forSum);
                                var allResult = $('.totalthisnow').val();
                                var allbudget = $('.totalbudget').val();
                                var remainingbudget = allbudget-allResult;
                                $('.remainingbudget').val(remainingbudget);
                            });
                    }
                }
                 
            });

    });
    $("#budgetTable").on("click","button.modalnow1", function() {
        var budgetamount = $('#budgetamount').val();
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
                    window.alert("Already exist on the list.\nPlease choose another item.");
                    $('myModal').modal('hide');
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
                    forSum += Number($(this).val().match(/\d+/));
                    $('.totalthisnow').val(forSum);
                    var allResult = $('.totalthisnow').val();
                    var allbudget = $('.totalbudget').val();
                    var remainingbudget = allbudget-allResult;
                    $('.remainingbudget').val(remainingbudget);
                });
            });

    });
    $("#budgetTable").on("click","button.deleteme", function(deleter) {
    var budgetamount = $('#budgetamount').val();
    var countTR = $('#packageTable tr').length;
     $(this).parent().parent().remove();   
     var forSum = 0;
        $('.qty1').each(function() {
            forSum += Number($(this).val().match(/\d+/));
            var remainingbudget = budgetamount-forSum;
            var fixed = $('.iLoveCode').attr("iLoveCode");
            var fixedbudget = budgetamount-fixed;
            var recentPrice = $('.iLoveCode').attr("sameprice");
            if(forSum == recentPrice){
                $('.totalthisnow').val(fixed);
                $('.remainingbudget').val(fixedbudget);
            }else{
                $('.totalthisnow').val(forSum);
                $('.remainingbudget').val(remainingbudget);
            }
        });
        if($('.totalthisnow').val() < 500){
            $('.proceed').prop('disabled',true);
        } else {
            $('.proceed').prop('disabled',false);
        }
    });
    