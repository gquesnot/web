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

	$('#meal').change(function(){
		var value = $(this).val();
		$.ajax({
      		method: "POST",
      		url: getRequestUrl()+"/meal/",
      		data: { id: value }
   		})
      	.done(function(json) {
        	var meals = JSON.parse(json);
        	$('#mealInfo img').attr('src', getWwwUrl() + '/images/meals/'+meals['Photo']);
       		$('#mealInfo p:first-of-type').text(meals['Description']);
       		$('#mealInfo p:last-child').text('Prix:'+meals['SalePrice']);
        
      	});
	});

	$('#addOrder').click(function(){
		$.ajax({
      		method: "POST",
      		url: getRequestUrl()+"/meal/",
      		data: { id: value,
      				quantity: $('#QuantityOrdered').val();
      				
      		 		}
   		})
   		.done(function(json){

   		});
	})


});


