'use strict';   // Mode strict du JavaScript

/*************************************************************************************************/
/* ****************************************** DONNEES ****************************************** */
/*************************************************************************************************/



/*************************************************************************************************/
/* ***************************************** FONCTIONS ***************************************** */
/*************************************************************************************************/



/*************************************************************************************************/
/* ************************************** CODE PRINCIPAL *************************************** */
/*************************************************************************************************/


var tab=[
	["img/1.jpg","tag"],
	["img/2.jpg","route"],
	["img/3.jpg","bâtiment moche"],
	["img/4.jpg","immeuble simple"],
	["img/5.jpg","immeuble futuriste"],
	["img/6.jpg","tour effeil"]
];


tab[5][0]

var i = 0;
var intervalId;
var nav = document.getElementById("toolbar-toggle");
var ul = document.querySelector("ul");
var previous= document.getElementById("slider-previous");
var next = document.getElementById("slider-next");
var play = document.getElementById("slider-toggle");
var random = document.getElementById("slider-random");
var img = document.getElementsByTagName("img");
var figcaption = document.getElementsByTagName("figcaption");
console.log(figcaption.innerHTML);
console.log(img[0].attributes[0])


nav.addEventListener("click", function(){ul.classList.toggle("hide");});


console.log(document.getElementById("slider"));
console.log(document.getElementsByTagName("img")[0].attributes);
document.getElementsByTagName("img")[0].attributes[0].value="img/2.jpg";


function transistion(i)
{
	intervalId = setInterval(affiche_next(), 3000);
}

function stop()
{
	clearInterval(intervalId);
}


function affiche_next()
{
	if (i == tab.length)
		i = 0;
	else
		i++;
	img.attributes[0].value = tab[i][0];
	figcaption.innerHTML = tab[i][1];
}

function affiche_prev()
{
	if (i == 0)
		i = 5;
	else
		i--;
	img.attributes[0].value = tab[i][0];
	figcaption.innerHTML = tab[i][1];
}