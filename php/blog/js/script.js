"use strict";
//menu pour login
var admin = document.getElementById('admin')
admin.addEventListener("click", revealAdminLogin, false);

 function revealAdminLogin(event)
 {
 	if (admin !== event.target)
 		return;
 	document.getElementById("admin_hide").classList.toggle("reveal");
 }
