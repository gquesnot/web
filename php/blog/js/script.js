"use strict";
//menu pour login
if (document.getElementById('admin'))
{
var admin = document.getElementById('admin')
admin.addEventListener("click", revealAdminLogin, false);

 function revealAdminLogin(event)
 {
 	if (admin !== event.target)
 		return;
 	document.getElementById("admin_hide").classList.toggle("reveal");
 }

}

if (document.getElementById('disconnect'))
{
	console.log('aa');
	 document.getElementById('disconnect').addEventListener("click", function(){location.href="disconnect.php"});

}