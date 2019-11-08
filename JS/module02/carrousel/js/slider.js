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


var i = 0;
var intervalId = 0;
var nav = document.getElementById("toolbar-toggle");
var ul = document.getElementById("img");
var puce = document.querySelectorAll("#puce>li");
var previous= document.getElementById("slider-previous");
var next = document.getElementById("slider-next");
var play = document.getElementById("slider-toggle");
var button_play = document.getElementsByClassName("fa-play")[0];
var random = document.getElementById("slider-random");
var random_2 = document.getElementsByClassName("fa-random")[0];
var img = document.getElementsByTagName("img")[0];
var figcaption = document.getElementsByTagName("figcaption")[0];
var puce_prev = 0;
var puce_actual = 0;




nav.addEventListener("click", function(){ul.classList.toggle("hide");});
previous.addEventListener("click", affiche_prev);
next.addEventListener("click", affiche_next);
play.addEventListener("click", start_play);
random.addEventListener("click", start_random);

document.onkeydown = checkKey;

function checkKey(event)
{
	if (event.keyCode == "37")
	{
		affiche_prev();
	}
	else if(event.keyCode == "39")
	{
		affiche_next();
	}
}


set_puce();
for (var j = 0 ; j< puce.length;j++)
{
	puce[j].dataset.id=j;
	puce[j].addEventListener("click", puce_select);
}

function start_play()
{
		if (intervalId != 0)
		{
			stop_random();
		}
		button_play.classList.remove("fa-play");
		button_play.classList.add("fa-pause");
		play.removeEventListener("click", start_play);
		play.addEventListener("click", stop_play);
		intervalId = setInterval(affiche_next, 1000);


}



function start_random()
{
	if (intervalId != 0)
		stop_play();
	random.classList.add("random_selected");
	random_2.classList.add("green");
	random.removeEventListener("click", start_random);
	random.addEventListener("click", stop_random);

	intervalId = setInterval(play_random, 1000);
}





function stop_play()
{
		play.removeEventListener("click", stop_play);
		play.addEventListener("click", start_play);
		button_play.classList.remove("fa-pause");
		button_play.classList.add("fa-play");
		stop();
}


function stop_random()
{
	random.removeEventListener("click", stop_random);
	random.addEventListener("click", start_random);
	random.classList.remove("random_select");
	random_2.classList.remove("green");
	stop();
}


function stop()
{
	clearInterval(intervalId);
	intervalId = 0;
}

function play_random()
{	 
	var j = Math.floor(Math.random()*tab.length);
	while (i == j)
	{
		j = Math.floor(Math.random()*tab.length);
	}
	i = j;
	set_puce();
	img.attributes[0].value = tab[i][0];
	figcaption.innerHTML = tab[i][1];
}


function affiche_next()
{
	if (i >= tab.length -1)
		i = 0;
	else
		i++;
	set_puce();
	img.attributes[0].value = tab[i][0];
	figcaption.innerHTML = tab[i][1];
}

function affiche_prev()
{
	if (i == 0)
		i = 5;
	else
		i--;
	set_puce();
	img.attributes[0].value = tab[i][0];
	figcaption.innerHTML = tab[i][1];
}


function set_puce()
{
	puce[puce_actual].classList.remove("selected");
	puce_prev = puce_actual;
	puce_actual = i;
	puce[puce_actual].classList.add("selected");
}


function puce_select()
{
	
	i = this.dataset.id;
	set_puce();
	img.attributes[0].value = tab[i][0];
	figcaption.innerHTML = tab[i][1];
}