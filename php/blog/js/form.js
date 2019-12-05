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
		if ($('.trumbowyg-editor').text() == "")
		{
			erreur++;
			$('.trumbowyg-box').css('border-color', 'red');
		}
		else
		{
			$('.trumbowyg-box').css('border-color', 'green');
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
		if($('.trumbowyg-editor').text() == "")
		{
			$('.trumbowyg-box').css('border-color', 'red');
			erreur++;
		}
		else{
			$('.trumbowyg-box').css('border-color', 'green');
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
		if ($('.trumbowyg-editor').text() == "")
		{
			$('.trumbowyg-box').css('border-color', 'red');
			erreur++;
		}
		else
		{
			$('.trumbowyg-box').css('border-color', 'green');
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

	$('#content, #commentary').trumbowyg({
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


	$('#delete_com').click(function(event){
		event.preventDefault();
		document.location.href= "delete_com.php?id="+ $('#delete_com').data('id');

	});



});