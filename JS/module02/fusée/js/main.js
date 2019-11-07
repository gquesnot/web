'use strict';

/***********************************************************************************/
/* *********************************** DONNEES *************************************/
/***********************************************************************************/



/***********************************************************************************/
/* ********************************** FONCTIONS ************************************/
/***********************************************************************************/



/************************************************************************************/
/* ******************************** CODE PRINCIPAL **********************************/
/************************************************************************************/


var button = document.getElementById("firing-button");
var rocket = document.getElementById("rocket");
var lauching_ramp = document.getElementById("launching-ramp");
var compteur= document.querySelector("#billboard>span");
var main = document.querySelector("main");
var intervalId;
var timeoutId;
var time = 10;

console.dir(button);
console.dir(rocket);
console.dir(lauching_ramp);
console.dir(compteur);

button.addEventListener("click", start);

function start()
{
	button.classList.add("disabled");
	button.removeEventListener("click", start);
	rocket.attributes[1].value="images/rocket2.gif";
	intervalId = setInterval(show_time, 1000);
}


function lauch_start()
{
	rocket.classList.add("tookOff");
}

function show_time()
{
	if (time <= 0)
	{
		stop();
		rocket.attributes[1].value="images/rocket3.gif";
		lauch_start();
	}
	compteur.innerHTML = time;
	time--;
}


function stop()
{
	clearInterval(intervalId);
}


for (var i = 0 ;i < 150 ;i++)
{
	var classe = Math.floor(Math.random()*3)+1;
	console.log(classe);
	var img = document.createElement("div");
	img.alt="star";
	img.style.top = (Math.random()*100)+"%";
	img.style.right = (Math.random()*100)+"%";
	img.classList.add("star");
	if (classe%3==0)
		img.classList.add("tiny");
	else if (classe%3==1)
		img.classList.add("normal");
	else
		img.classList.add("big");
	document.body.appendChild(img);
}