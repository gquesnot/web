"use strict"




class Forme{
	constructor(){
		this.color = 'black';
		this.x = '';
		this.y = '';
		this.size = '';
		this.context = '';
		this.oldForm ='';
	}
	setColor()
	{
		this.color  = col;
	}
	setSize()
	{
		this.size = weight;
	}
	setPos(e)
	{
		this.x = e.clientX - canvas.offsetLeft-1;
		this.y = e.clientY - canvas.offsetTop -1;
	}
	setContext()
	{
		this.context = canvas.getContext('2d');
	}
	set()
	{

	}
	draw(){

	}
}


var canvas = document.getElementById("canvas");
canvas.addEventListener("mousedown", createNewObject);
var elem = new Forme;


var color = document.querySelectorAll('#color>li');
var col = 'black';
var color_tab = ['black', '#5C2121', '#B9141B', '#FABD09', '#2EB814', '#2A9E99', '#2178A6'];
for(var i = 0; i < color.length; i++)
{
	color[i].classList.add('color'+i);
	color[i].dataset.id =i;
	color[i].addEventListener('click', function(){
		col = color_tab[this.dataset.id];
		console.log(col);
	});
}

var weight = 3;
var weight_li = document.querySelectorAll('#size>li');
for (var i = 0; i < weight_li.length; i++)
{
	weight_li[i].dataset.id = i;
	weight_li[i].addEventListener('click', function(){
	if (this.dataset.id == 0)
		weight = 1;
	else if (this.dataset.id == 1)
		weight = 3;
	else
		weight = 6;

	});
}

var erase = document.getElementById('erase');
erase.addEventListener('click', function(){
	col = 'white';
	weight = 10;
	console.log('erase');
})

var write = document.getElementById('write');
write.addEventListener('click', function(){
	col = 'black';
	weight = 3;
	console.log('write');
})




var _listener = function(e){
		var sec = new Forme();
		sec.setPos(e);
		sec.setColor();
		elem.context.lineTo(sec.x, sec.y);
		elem.context.moveTo(sec.x, sec.y);
		elem.context.strokeStyle =elem.color;
		elem.context.stroke();
		
	}

	function endLine()
	{
		 elem.context.closePath();
		
		canvas.removeEventListener("mousemove", _listener);
		canvas.removeEventListener('mouseup', endLine);
		canvas.addEventListener("mousedown", createNewObject);
	}





function createNewObject(e)
{
	canvas.removeEventListener("mousedown", createNewObject);
	canvas.addEventListener("mouseup", endLine);
	elem.setColor();
	elem.setSize();
	elem.setPos(e);
	elem.setContext();
	elem.context.beginPath();
	elem.context.moveTo(elem.x, elem.y);
	elem.context.lineWidth = elem.size;
	canvas.addEventListener("mousemove", _listener);
}
