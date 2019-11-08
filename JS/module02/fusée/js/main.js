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


var plus = document.getElementById("plus");

var button_start = document.getElementById("firing-button");
var button_cancel = document.getElementById("cancel-button");
var button_reset = document.getElementById("reset-button");
var rocket = document.getElementById("rocket");
var lauching_ramp = document.getElementById("launching-ramp");
var compteur= document.querySelector("#billboard>span");
var main = document.querySelector("main");
var intervalId;
var timeoutId;
var time = 0;
var k = 17;


button_start.addEventListener("click", start);
button_reset.addEventListener("click", reset_rocket);
compteur.innerHTML = time;

function start()
{
	button_cancel.classList.remove("disabled");
	button_cancel.addEventListener("click", stop_rocket);
	button_start.classList.add("disabled");
	button_start.removeEventListener("click", start);
	rocket.attributes[1].value="images/rocket2.gif";
	intervalId = setInterval(show_time, 1000);
}

function stop_rocket()
{
	stop();
	button_start.addEventListener("click", start);
	button_start.classList.remove("disabled");
	button_cancel.classList.add("disabled");

}


function reset_rocket()
{
	time = 10;
	button_cancel.removeEventListener("click", stop_rocket);
	button_start.addEventListener("click", start);
	button_start.classList.remove("disabled");
	button_cancel.classList.add("disabled");
	rocket.classList.remove("tookOff");
	stop();
	rocket.attributes[1].value="images/rocket1.png";
	compteur.innerHTML = time;

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
		button_cancel.removeEventListener("click", stop_rocket);
		button_cancel.classList.add("disabled");
		intervalId = setInterval(after_launch, 1000);

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






function after_launch()
{
	if(k == 0)
	{
		rocket.attributes[1].value="images/rocket1.png";
		stop();
	}
k--

}