"use strict";

$(function() {

	$('#ok').click(function(){
		var erreur = 0;
		if ($('#title').val().length < 3)
		{
			erreur++;
			$('#title').css('border-color', 'red');
		}
		if ($('#content').val().length < 3)
		{
			erreur++;
			$('#content').css('border-color', 'red');
		}
		if ($('#category').val() == null)
		{
			erreur++;
			$('#category').css('border-color', 'red');
		}
		if ($('#user_id').val() == undefined)
		{
			erreur++;
			$('#uti_id').css('border-color', 'red');
		}
		if (erreur == 0)
		{
			$('#ok').submit();
		}
		else{
			return false;
		}



	});
});