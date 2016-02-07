$('.editmenow').click(function(a){
	a.preventDefault();
	var editpackage = $(this).attr('id');
	$('#hideShow').attr("class","col-sm-12");
	$('#headerHide').attr("class","sub-header");
	$.post('editpackage.php',{ editpackage:editpackage },function(data){
		$('#editThisNow').html(data);
	});
	$('#editThisNow').attr("class", "table table-striped");
	$('#addHideFirst').attr("class","hide");
	$('#addThisNow').attr("class","hide");
	$('#addShow').attr("class","hide");
	$('.choosemenow').attr("value", editpackage);
});
$('#forAddButton').click(function(b){
	b.preventDefault();
	$('#addHideFirst').attr("class","sub-header");
	$('#addThisNow').attr("class","table table-striped");
	$('#addShow').attr("class","col-sm-12");
	$('#hideShow').attr("class","hide");
	$('#headerHide').attr("class","hide");
	$('#editThisNow').attr("class","hide");
});
$('button[id=cancelme]').click(function(c){
	c.preventDefault();
	$('#hideShow').attr("class","hide");
	$('#headerHide').attr("class","hide");
	$('#editThisNow').attr("class","hide");
	$('#addHideFirst').attr("class","hide");
	$('#addThisNow').attr("class","hide");
	$('#addShow').attr("class","hide");
});
$('.choosemenow').click(function(d){
	d.preventDefault();
	var forPick = $(this).val();
	var toVal = $('.qty1').val();
	var toPrice = $('.qty').val();
	var ask = window.confirm('Are you sure you want to edit this item?');
	$.post('editprocess.php',{ id:forPick,name:toVal,price:toPrice },function(data){
		if(ask){
			document.location.href = 'itempackages.php';
			window.alert("Successfuly Changed!");
		}
	});
});
$('.addMeNow').click(function(e){
	var forAddName = $('#addName').val();
	var forPriceName = $('#priceName').val();
	var ask = window.confirm('Are you sure you want to add this item?');
	$.post('editprocess.php',{ addName:forAddName,addPrice:forPriceName },function(data){
		if(ask){
			document.location.href = 'itempackages.php';
			window.alert("Successfuly Added!");
			location.reload();
		}
	});
});
$('.deletemenow').click(function(){
	var idForDel = $(this).attr('id');
	var nameForDel = $('input[sample='+idForDel+']').val();
	var ask = window.confirm('Are you sure you want to delete '+nameForDel+'?');
	
		if(ask){
			$.post('editprocess.php',{ forDelete:idForDel },function(data){
				window.alert("Successfuly Deleted!");
				document.location.href = 'itempackages.php';
			location.reload();
			});
		}
});
$('.acceptit').click(function(){
	var idForAccept = $(this).attr('id');
	var ask = window.confirm('Are you sure you want to accept this reservation without viewing?');
	var alert = 'Request Accepted! File has been move to "Accepted Reservations"';
	if(ask==true){
		$.post('pending.php?id='+idForAccept+'',{ accept:idForAccept, },function(data){
			window.alert('Request Accepted! File has been move to "Accepted Reservations"');
			location.reload();
		});
	}
});
$('.rejectit').click(function(){
	var idForAccept = $(this).attr('id');
	var ask = window.confirm('Are you sure you want to reject this reservation without viewing?');
	var alert = 'Request Accepted! File has been move to "Accepted Reservations"';
	if(ask==true){
		$.post('pending.php?id='+idForAccept+'',{ decline:idForAccept, },function(data){
			window.alert('Request Rejected! File has been move to "Declined Reservations"');
			location.reload();
		});
	}
});