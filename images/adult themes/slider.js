$(document).ready(function(){

	var image1 = 1;
	var image2 = 2;
	var image3 = 3;
    var maxImage = 6; //depends on the number of images
    var cur1 = 1;
	var cur2 = 2;
	var cur3 = 3;

	$('#next').click(function(){

	if (image1 >= maxImage) { 
		image1 = 1;
		image2 = 2;
		image3 = 3;
	}
	
    else { 
      	image1++;
		image2++;
		image3++;
		
		if (image1 >= maxImage){
				image2 = 1; 
		}
		if (image2 >= maxImage){
				image3 = 1; 
		}
		
		
		
    }
		$('#bigImage1').attr("src", "../images/adult themes/" + image1 + ".jpg");
		$('#bigImage2').attr("src", "../images/adult themes/" + image2 + ".jpg");
		$('#bigImage3').attr("src", "../images/adult themes/" + image3 + ".jpg");

		cur1 = image1;
		cur2 = image2;
		cur3 = image3;
	});
	
	
	$('#prev').click(function(){
	if (image3 <= 1) { 
		image1 = 4; 
		image2 = 5; 
		image3 = maxImage; 
	}


    else { 
		image1--; 
		image2--; 
      	image3--; 
			if (image1 <= 0) {  
				image1 = maxImage; 
			}
			if (image2 <= 0){
				image2 = maxImage; 
			}

    }
	
	$('#bigImage1').attr("src", "../images/adult themes/" + image1 + ".jpg");
	$('#bigImage2').attr("src", "../images/adult themes/" + image2 + ".jpg");
    $('#bigImage3').attr("src", "../images/adult themes/" + image3 + ".jpg");
	
    cur1 = image1;
	cur2 = image2;
	cur3 = image3;
	});





});