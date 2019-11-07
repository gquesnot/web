var listPhoto;
var total;


listPhoto = document.getElementById("photo-list");

console.log(listPhoto);




listPhoto.ondragstart = function(){return false;};
total = document.getElementById("total");
child= listPhoto.childNodes;
var child2 = child[1].childNodes;
console.log(child2);

for(var i = 1; i < child.length; i += 2)
{
	child[i].addEventListener("click", photoSelected);

}





function writeTotal()
{
	var nbPhoto = document.querySelectorAll(".selected").length;
	
	total.innerHTML="vous avez sélectionné <span>"+nbPhoto+"</span> photo(s)";
}



function photoSelected()
{
	this.classList.toggle("selected");
	writeTotal();
}