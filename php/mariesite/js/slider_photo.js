"user strict";


var mineral= ["img/photo/mineral/IMG_8563.JPG", "img/photo/mineral/IMG_8636.JPG","img/photo/mineral/IMG_9486.JPG", "img/photo/mineral/IMG_20170914_17.JPG"];
var animal = ["img/photo/animal/IMG_0464.JPG", "img/photo/animal/IMG_1358.JPG", "img/photo/animal/IMG_1354.JPG", "img/photo/animal/IMG_1348.JPG", "img/photo/animal/IMG_0782.JPG"];
var landscape =["img/photo/landscape/IMG_1066.JPG", "img/photo/landscape/IMG_9476.JPG", "img/photo/landscape/IMG_9467.JPG", "img/photo/landscape/IMG_8808.JPG"];
var vegetal = ["img/photo/vegetal/IMG_0285.JPG", "img/photo/vegetal/IMG_0410.JPG", "img/photo/vegetal/IMG_0305.JPG", "img/photo/vegetal/IMG_0298.JPG"];

$(function() {
	$('#menu_landscape').click(function (){
		changeTheme(landscape);
	});
	$('#menu_animal').click(function (){
		changeTheme(animal);
	});
	$('#menu_vegetal').click(function (){
		changeTheme(vegetal);
	});
	$('#menu_mineral').click(function (){
		changeTheme(mineral);
	});


	function changeTheme($tab)
	{

	}


	function setImageFront(src, alt)
	{
		$('#front_img').attr('src', src);
		$('#front_img').attr('src', alt);
	}
	function setTheme(tab)
	{
		var menu_right = "";
		setImageFront(tab[0], tab[0]);
		for(var i = 0; i <  tab.length; i++)
		{
			menu_right += "<li><img id=\"img_right_"+ i +"\" src=\""+ tab[i] +"\" alt=\""+ tab[i]+"\" ></li>";

		}
		console.log(menu_right);
		$('#menu_right').html(menu_right);

	}
	setTheme(vegetal);



});
