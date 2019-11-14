var tab =["Janvier","Fevrier","Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"];
var actual_year= new Date();
var jour ="";
var anne ="";
var mois ="";


var date_jour = document.getElementById("date_jour");
var date_mois = document.getElementById("date_mois");
var date_anne = document.getElementById("date_anne");



actual_year = actual_year.getFullYear();


for (var i = 0; i < 12; i++)
{
	mois += "<option value=\""+tab[i]+"\">"+tab[i]+"</option>";
}

for (i = 1; i <= 31; i++)
{
	jour += "<option value=\""+i+"\">"+i+"</option>"
}

for (i = 0; i < 5; i++)
{	

	anne += "<option value=\""+actual_year+"\">"+actual_year+"</option>"
	actual_year++;
}



date_mois.innerHTML += mois;
date_jour.innerHTML += jour;
date_anne.innerHTML += anne;