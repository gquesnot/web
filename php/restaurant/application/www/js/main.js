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

$('#buttonNewAccountCancel').click(function(e){
	e.preventDefault();
	$('input, textarea').each(function(){
		$(this).val('');
	});

});
