

function superFunction(selecteur, classname)
{
	var elem = document.querySelector(selecteur);
	elem.classList.toggle(classname);
}

superFunction("#firstDiv", "hidden");