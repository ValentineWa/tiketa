
 $('.addtocart').click(function(e){
    e.preventDefault();
    const $cartQuantity = $('#cart-quantity');
    var eventid= $(this).attr('eventid');
    var userid = $(this).attr('userid');
    var baseUrl = $(this).attr('baseUrl');
    var quantity = $("#quantity_"+eventid).val();
    $.ajax({
        url:baseUrl+ "/site/addtocart?eventid="+eventid+"&userid="+userid+"&quantity="+quantity,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
            $cartQuantity.text(parseInt($cartQuantity.text() || 0) + 1);
        }
    }); 
    alert(eventid+' and '+userid+' and '+quantity);
    
});