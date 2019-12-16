'use strict';

/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //
/////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////

/*$('#buttonConnect').click(function(e){
	e.preventDefault();
	window.location.href = 'index.php/login/';
});

$('#buttonNewAccount').click(function(e){
	e.preventDefault();
	window.location.href = 'index.php/newaccount/';
});*/

$(function(){


	$('#buttonNewAccountCancel, #buttonLoginCancel').click(function(e){
		e.preventDefault();
		$('input, textarea').each(function(){
			$(this).val('');
		});
	});

	//ajax change mealon order
	$('#meal').change(function(){
		var value = $(this).val();
		$.ajax({
      		method: "POST",
      		url: getRequestUrl()+"/meal/",
      		data: { id: value }
   		})
      	.done(function(json) {
        	var meals = JSON.parse(json);
        	$('#mealInfo').attr('data-id', meals['Id']);
        	$('#mealInfo').attr('data-priceEach', meals['SalePrice']);
        	$('#mealInfo').attr('data-quantityInStock', meals['QuantityInStock']);
        	$('#mealInfo img').attr('src', getWwwUrl() + '/images/meals/'+meals['Photo']);
        	$('#mealInfo img').attr('alt', meals['Name']);
       		$('#mealInfo p:first-of-type').text(meals['Description']);
       		$('#price').text('Prix:'+meals['SalePrice']);
       		$('#mealInfo p:last-of-type').text('Quantité:' + meals['QuantityInStock']);
        
      	});
	});


	//ajax add order
	$('#addOrder').on("click",function(e){
		e.preventDefault();
		console.log(getQuantityOfName($('#mealInfo').attr('data-id'),$('#QuantityOrdered').val(), $('#mealInfo').attr('data-quantityInStock')));
		if ($('#QuantityOrdered').val() <= 0 || $('#QuantityOrdered').val() >  $('#mealInfo').attr('data-quantityInStock') || getQuantityOfName($('#mealInfo').attr('data-id'),$('#QuantityOrdered').val(), $('#mealInfo').attr('data-quantityInStock')))
		{
			$('#QuantityOrdered').css('border', '1px solid red');
			return;
		}
		else
		{
			$('#QuantityOrdered').css('border', '1px solid green');
		}
		$.ajax({
      		method: "POST",
      		url: getRequestUrl()+"/neworderline/",
      		data: { Meal_Id: $('#mealInfo').attr('data-id'),
      				QuantityOrdered: $('#QuantityOrdered').val(),
      				Order_Id : $('#orderInfo').attr('data-orderId'),
      				PriceEach: $('#mealInfo').attr('data-priceEach')
      		 	}
   		})
   		.done(function(json){
   			var orderline = JSON.parse(json);
   			var tmp = showOrderLine(orderline);
   			$('#orderInfo>tbody').html(tmp);
   			$('tr td:last-of-type i').on("click", removeOrderLine);
   		});
	});

	$('tr td:last-of-type i').on("click", removeOrderLine);

	// button cancel
	$('#buttonOrderCancel, #buttonPayCancel').on("click", function(e){
		e.preventDefault();
		
		window.location.href="../removeorder?id="+$('#orderInfo').attr('data-orderId');
	});

	//submit
	$('#buttonNewAccountSubmit, #buttonLoginSubmit').click(function(e){
		e.preventDefault();
		var erreur = 0 ;
		$('input, textarea').each(function(){
			if ($(this).val() == '')
			{
				$(this).css('border', '1px solid red');
				erreur++;
			}
			else
			{
				$(this).css('border', '1px solid green');
			}
		});
		if (erreur == 0)
			$('.generic-form').submit();
		else
			return ;
	});



	//payment
	$('#buttonPaySubmit').click(function (e){
		e.preventDefault();
		$.ajax({
      		method: "GET",
      		url: getRequestUrl()+"/stripe/",
      		data: { id: $('#orderInfo').attr('data-orderId')
      		 		}
   		})
   		.done(function(json){
   			var order= JSON.parse(json);
   			console.log(order);
   			var stripe = Stripe('pk_test_nqg3grYa8HWO9LxQ6AYfBH0C00pyd2wAnH');
			stripe.redirectToCheckout({
  				// Make the id field from the Checkout Session creation API response
  				// available to this file, so you can provide it as parameter here
  				// instead of the {{CHECKOUT_SESSION_ID}} placeholder.
  				sessionId: order['id']
			}).then(function (result) {
 				// If `redirectToCheckout` fails due to a browser or network
 		 		// error, display the localized error message to your customer
 		 		// using `result.error.message`.
			});
   		});
	});




});
	


function removeOrderLine()
{
	$.ajax({
			method : "GET", 
			url: getRequestUrl()+"/neworderline/",
			data:{	id : $(this).attr('data-id'),
					Order_Id: $('#orderInfo').attr('data-orderId')
			}
		})
		.done(function (json){
			var orderline = JSON.parse(json);
   			var tmp = showOrderLine(orderline);
   			$('#orderInfo>tbody').html(tmp);
			$('tr td:last-of-type i').on("click", removeOrderLine);
		});

}


function getQuantityOfName(id, quantity, quantityMax)
{
	var qu1 = 0; 
	console.log('name: '+id+' //quantitty: '+quantity+" //quantity++ : "+$('#'+id).text()+'// qmax: '+quantityMax);
	if ($('#'+id).text())
		qu1  = $('#'+id).text();
	console.log(qu1);
	if (parseInt(qu1) + parseInt(quantity) > parseInt(quantityMax))
		return true;
	else
		return false;
	
}


function showOrderLine(orderline)
{
	var tmp ='';
   	$.each(orderline, function(index, value){
   		tmp += '<tr><td id=\"'+value['Id']+'\">'+value['QuantityOrdered'] + '</td><td>';
   		tmp +=  value['Name'] +'</td><td>';
   		tmp += value['PriceEach']+'</td><td>';
   		tmp += (value['PriceEach'] * value['QuantityOrdered']) + "</td><td><i data-id=\""+value['orderline_id']+"\" class=\"fas fa-trash-alt\"></i></td></tr>";
   	});

	return tmp;
}
