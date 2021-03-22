$('.addtocart').click(function(e){
	e.preventDefault();
	var productid = $(this).attr('productid');
	var userid = $(this).attr('userid');
	var baseUrl = $(this).attr('baseUrl');
	var quantity = $("#quantity_"+productid).val();
	
	$.ajax({
        url: baseUrl+"/product/addtocart?productid="+productid+"&userid="+userid+"&quantity="+quantity,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
	
	alert(productid+' and '+userid+' and '+quantity);
 });
