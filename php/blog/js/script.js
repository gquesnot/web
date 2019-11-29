"use strict";
//menu pour login

$(function(){

	$('#admin').click(revealAdminLogin);


 function revealAdminLogin(event)
 {
 	if (admin !== event.target)
 		return;
 	$.ajax({
 		method:"POST",
 		url:"session.php"
 	}).done(function(json){
 		console.log(json);
 		if (1 == parseInt(json))
 			window.location.replace("admin.php");
 		else
 			$('#admin_hide').toggle();
 	});
 	

 }



if (document.getElementById('disconnect'))
{
	 document.getElementById('disconnect').addEventListener("click", function(){location.href="disconnect.php"});

}

});