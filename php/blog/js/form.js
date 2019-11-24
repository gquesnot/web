"use strict";

$(function() {

	$('#ok').click(function(){
		var erreur = 0;
		if ($('#title').val().length < 3)
		{
			erreur++;
			$('#title').css('border-color', 'red');
		}
		else
		{
			$('#title').css('border-color', 'green');
		}
		if ($('#content').val().length < 3)
		{
			erreur++;
			$('#content').css('border-color', 'red');
		}
		else
		{
			$('#content').css('border-color', 'green');
		}

		if ($('#category').val() == "")
		{
			erreur++;
			$('#category').css('border', '1px solid red');
		}
		else
		{
			$('#category').css('border', '1px solid green');
		}
		if ($('#auteur_id').val() == "")
		{
			erreur++;
			$('#auteur_id').css('border', '1px solid red');
		}
		else
		{
			$('#auteur_id').css('border', '1px solid green');
		}
		if (erreur == 0)
		{
			$('form').submit();
		}
		else{
			return false;
		}



	});
});