"use strict"

class Forme{
	constructor(){
		this.color = '';
		this.x = '';
		this.y = '';
		this.size = '';
	}
	setColor()
	{
		this.color  = 'black';
	}
	setSize()
	{
		this.size = 3;
	}
	setPos(e)
	{
		this.x = e.clientX;
		this.y = e.clientY;
	}

	draw(){

	}
}



var canvas = document.getElementById("canvas");
canvas.addEventListener("click", createNewObject);


function createNewObject(e)
{
	this.removeEventListener("click", createNewObject);
	var elem = new Forme();
	elem.setColor();
	elem.setSize();
	elem.setPos(e);
	ctx = canvas.getContext('2d');
	ctx.moveTo(elem.x, elem.y);
	canvas.addEventListener("click", function(event){
		
	});
}
