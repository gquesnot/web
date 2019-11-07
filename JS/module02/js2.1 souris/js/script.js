

var elem = document.querySelector("button");
var elemdiv=document.querySelector("div");
elem.addEventListener("click", function(){
	
	elemdiv.classList.toggle("hide");
});


elemdiv.addEventListener("dblclick", function(){
	elemdiv.classList.toggle("good");
});


elemdiv.addEventListener("mouseover", function(){
	elemdiv.classList.add("important");
});

elemdiv.addEventListener("mouseout", function(){
	elemdiv.classList.remove("important");
	elemdiv.classList.remove("good");
})