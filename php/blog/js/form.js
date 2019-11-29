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

	$('#cancel').click(function(event){
		event.preventDefault();
		$('#title').val("");
		$('#content').trumbowyg('empty');
		$("#category").val("");
		$('#auteur_id').val("");
		return false;
	
	});
	$('#cancel_com').click(function(event){
		event.preventDefault();
		$('#pseudo').val("");
		$('#commentary').trumbowyg('empty');
		$
		return false;
	
	});

	$('#ok_com').click(function(event){
		var erreur = 0;
		if ($('#pseudo').val() == "")
		{
			$('#pseudo').css('border-color', 'red');
			erreur++;
		}
		else{
			$('#pseudo').css('border-color', 'green');
		}
		if($('#commentary').val() == "")
		{
			$('#commentary').css('border-color', 'red');
			erreur++;
		}
		else{
			$('#commentary').css('border-color', 'green');
		}
		if (erreur == 0)
		{
			$('form').submit();
		}
		else{
			return (false);
		}
	});

	$('#ok_mod').click(function(event){
		event.preventDefault();
		var erreur = 0;
		if ($('#title').val() == "")
		{
			$('#title').css('border-color', 'red');
			erreur++;
		}
		else
		{
			$('#title').css('border-color', 'green');
		}
		if ($('#content').val() == "")
		{
			$('#content').css('border-color', 'red');
			erreur++;
		}
		else
		{
			$('#content').css('border-color', 'green');
		}
		if (erreur == 0)
		{
			$('form').submit();
		}
		else{
			return false;
		}


	});
	$('#cancel_mod').click(function(event){
		event.preventDefault();
			document.location.href= "admin.php";
			exit();
		});

	$('textarea').trumbowyg({
		btns: [
        ['viewHTML'],
        ['undo', 'redo'], // Only supported in Blink browsers
        ['formatting'],
        ['strong', 'em', 'del'],
        ['superscript', 'subscript'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']
    ]
	});



});