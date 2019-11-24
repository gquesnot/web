"use strict"

//genere un tableau avec une hauteur , largeur et un nombre de mine
function generate_tab(height, width, nb_mine) {
    var tab = new Array(height);
    var tab_mine = new Array(nb_mine);
    var total = height * width;
    var index = 0;

    for (var i = 0; i < height; i++) {
        tab[i] = new Array(width);
    }
    for (i = 0; i < nb_mine; i++) {
        var random = Math.floor(Math.random() * total);
        while (tab_mine.includes(random)) {
            random = Math.floor(Math.random() * total);
        }
        tab_mine[i] = random;
    }
    for (i = 0; i < height; i++) {
        for (var j = 0; j < width; j++) {
            index = tab_mine.indexOf(i * width + j);
            if (index != -1) {;
                tab_mine.splice(index, 1);
                tab[i][j] = true;

            } else
                tab[i][j] = false;
        }
    }
    return (tab);
}

//renvoie le nombre de mine autour des coordonnées x y 
function getMineNumber(tab, x, y) {
    var nb_mine = 0;
    var x_tmp = x;
    var y_tmp = y;
    var x_length = tab[0].length;
    var y_length = tab.length;
    var j = 0;
    var i = 0;

    //definie le depart et la taille de la boucle
    if (y >= y_length || x >= x_length || y < 0 || x < 0)
        return (false);
    if (tab[y][x] == true)
        return (-1);
    if (x - 1 >= 0)
        x_tmp = x - 1;
    if (y - 1 >= 0)
        y_tmp = y - 1;
    if (x + 1 < x_length && x_tmp != x)
        x_length = 3;
    else if (x + 1 < x_length || (x + 1 >= x_length && x_tmp != x))
        x_length = 2;
    else
        x_length = 1;
    if (y + 1 < y_length && y_tmp != y)
        y_length = 3;
    else if (y + 1 < y_length || (y + 1 >= y_length && y_tmp != y))
        y_length = 2;
    else
        y_length = 1;
    while (j < y_length) {
        while (i < x_length) {
            if (tab[y_tmp + j][x_tmp + i] == true) {
                nb_mine++;
            }
            i++;
        }
        i = 0;
        j++;
    }
    return (nb_mine);
}


//affiche le demineur
function show_tab(tab, height, width)
{
	var elem = document.getElementsByTagName("table")[0];
	
	for (var j = 0; j< height; j++)
	{	
		var row = elem.insertRow(j);
		for(var i = 0; i < width; i++)
		{
			var cell = row.insertCell(i);
			cell.innerHTML = getMineNumber(tab, i, j)+"<div></div>";
			if (cell.innerHTML == "-1<div></div>")
				cell.dataset.bomb = 1;
			else
				cell.dataset.bomb = 0;
			cell.dataset.x = i;
			cell.dataset.y = j;
			cell.dataset.height = height;
			cell.dataset.width = width;
		}

	}
}

//ajoute les evenements
function add_click(tab, height, width)
{
	let i = 0;
	var div = document.getElementsByTagName("div");
	var td = document.getElementsByTagName("td")

	while (i < div.length)
	{

		div[i].addEventListener("click", function(){this.classList.add("reveal");});
		td[i].addEventListener("click", function(){this.classList.add("white");});
		td[i].addEventListener("click", reveal_all);
		div[i].addEventListener("contextmenu", function(){this.classList.add("flag");});
		div[i].addEventListener('contextmenu', function(ev) {ev.preventDefault();return false;}, false);
		i++;
	}
}

//renvoie un tableau crée à partir des valeurs des td
function get_tab_from_td()
{
	var td = document.getElementsByTagName("td");
	var height = td[0].dataset.height;
	var width = td[0].dataset.width;
	var array = new Array(height);
	for (var i = 0; i < height; i++)
	{
		array[i] = new Array(width);
	}
	for (var j = 0; j < height; j++)
	{
		for (i = 0; i < width; i++)
		{
			array[j][i] = parseInt(td[j*width + i].innerHTML);
		}
	}
return (array);

}

//renvoie un tableau de coordonées des cases contenant un 0 autour de base_coor
function get_null_around(tab, height, width, base_coor)
{
	var array = new Array();
	array = [];
	if (base_coor.x - 1 >= 0)
	{
		if (tab[base_coor.y][base_coor.x - 1] == 0)
			{
			var coor = new Array(2);
			 coor[0]= base_coor.x - 1;
			coor[1] = base_coor.y;
			array.push(coor);
			}
		if (base_coor.y - 1 >= 0)
		{
			if (tab[base_coor.y -1][base_coor.x -1] == 0)
			{

				var coor = new Array(2);
				coor[0] = base_coor.x - 1;
			coor[1] = base_coor.y -1 ;
			array.push(coor);
			}
		}
		if (base_coor.y + 1 < height)
		{
			if (tab[base_coor.y + 1][base_coor.x -1] == 0)
			{
				var coor = new Array(2);
				coor[0] = base_coor.x - 1;
			coor[1] = base_coor.y +1 ;
			array.push(coor);
			}
		}
	}
	if (base_coor.x +1 < width)
	{
		if (tab[base_coor.y][base_coor.x +1] == 0)
			{
				var coor = new Array(2);
				coor[0] = base_coor.x + 1;
			coor[1] = base_coor.y ;
			array.push(coor);
			}
		if (base_coor.y - 1 >= 0)
		{
			if (tab[base_coor.y -1][base_coor.x +1] == 0)
			{
				var coor = new Array(2);
				coor[0] = base_coor.x + 1;
			coor[1] = base_coor.y -1 ;
			array.push(coor); 
			}
		}

		if (base_coor.y + 1 < height)
		{
			if (tab[base_coor.y +1][base_coor.x +1] == 0)
			{
				var coor = new Array(2);
				coor[0] = base_coor.x + 1;
			coor[1] = base_coor.y +1 ;
			array.push(coor); 
			}
		}
	}
	if (base_coor.y -1 >= 0)
	{
		if (tab[base_coor.y -1][base_coor.x] == 0)
			{
				var coor = new Array(2);
				coor[0] = base_coor.x;
			coor[1] = base_coor.y -1 ;
			array.push(coor); 
			}
	}
	if (base_coor.y +1 < height)
	{
		if (tab[base_coor.y +1][base_coor.x] == 0)
			{
				var coor = new Array(2);
				coor[0] = base_coor.x;
			coor[1] = base_coor.y +1 ;
			array.push(coor); 
			}
	}
	return (array);
}


//renvoie un tableau de coordonées des cases sans bombes autour de base_coor
function get_not_bomb_around(tab, height, width, base_coor)
{
	var array = new Array();
	array = [];
	if (base_coor.x - 1 >= 0)
	{
		if (tab[base_coor.y][base_coor.x - 1] != -1)
			{
			var coor = new Array(2);
			 coor[0]= base_coor.x - 1;
			coor[1] = base_coor.y;
			array.push(coor);
			}
		if (base_coor.y - 1 >= 0)
		{
			if (tab[base_coor.y -1][base_coor.x -1] != -1)
			{

				var coor = new Array(2);
				coor[0] = base_coor.x - 1;
			coor[1] = base_coor.y -1 ;
			array.push(coor);
			}
		}
		if (base_coor.y + 1 < height)
		{
			if (tab[base_coor.y + 1][base_coor.x -1] != -1)
			{
				var coor = new Array(2);
				coor[0] = base_coor.x - 1;
			coor[1] = base_coor.y +1 ;
			array.push(coor);
			}
		}
	}
	if (base_coor.x +1 < width)
	{
		if (tab[base_coor.y][base_coor.x +1] != -1)
			{
				var coor = new Array(2);
				coor[0] = base_coor.x + 1;
			coor[1] = base_coor.y ;
			array.push(coor);
			}
		if (base_coor.y - 1 >= 0)
		{
			if (tab[base_coor.y -1][base_coor.x +1] != -1)
			{
				var coor = new Array(2);
				coor[0] = base_coor.x + 1;
			coor[1] = base_coor.y -1 ;
			array.push(coor); 
			}
		}

		if (base_coor.y + 1 < height)
		{
			if (tab[base_coor.y +1][base_coor.x +1] != -1)
			{
				var coor = new Array(2);
				coor[0] = base_coor.x + 1;
			coor[1] = base_coor.y +1 ;
			array.push(coor); 
			}
		}
	}
	if (base_coor.y -1 >= 0)
	{
		if (tab[base_coor.y -1][base_coor.x] != -1)
			{
				var coor = new Array(2);
				coor[0] = base_coor.x;
			coor[1] = base_coor.y -1 ;
			array.push(coor); 
			}
	}
	if (base_coor.y +1 < height)
	{
		if (tab[base_coor.y +1][base_coor.x] != -1)
			{
				var coor = new Array(2);
				coor[0] = base_coor.x;
			coor[1] = base_coor.y +1 ;
			array.push(coor); 
			}
	}
	return (array);
}


//verifie qu'une coordonée n'est pas presente dans un tableau
function check_if_coor_in_array(tab, coor)
{
	for (var i = 0; i < tab.length; i++)
	{
		if (coor[0] == tab[i][0] && coor[1] == tab[i][1])
		{
			return (true);
		}
	}
	return (false);
}



//compare tab et tab_tmp renvoie tab_tmp sans les doubles 
function check_double(tab, tab_tmp)
{
	var i = 0;
	var j = 0;
	var tmp = new Array();

	while (i < tab_tmp.length)
	{
		if (!check_if_coor_in_array(tab,tab_tmp[i]))
		{
			tmp.push(tab_tmp[i]);
		}
		i++;
	}
	return (tmp);
}




//affiche un tableau de tableau avec x et y pour les logs
function show_log(string, tab)
{
	console.log(string + "//////////////");
	var i = 0
	while (tab[i] != undefined)
	{
		console.log("x: "+tab[i][0]+" y: "+tab[i][1]);
		i++;
	}
}

//prend un tableau de 2 case et le transforme en obj coordonnée
function array_in_coor(tab)
{
	if (tab)
	{
	var coor={
		x: tab[0],
		y: tab[1]
	};

	return(coor);
}
return (undefined);
}




//révéle les cases contenu dans tab (un tableau de coordonnées)
function reveal_from_tab(tab, width)
{
	var	div = document.getElementsByTagName("div");
	var td = document.getElementsByTagName("td");
	var i = 0;

	while (tab[i] != null)
	{
		div[tab[i][1]*width+tab[i][0]].classList.add("reveal");
		td[tab[i][1]*width+tab[i][0]].classList.add("white");
		i++;
	}

}


//retourne la concatenation de tab et tab_tmp en enlevant les doubles
function compare_for_no_double(tab, tab_tmp)
{
	var i = 0;

	while (i < tab_tmp.length)
	{
		if (!tab.includes(tab_tmp[i]))
		{
			tab.push(tab_tmp[i]);
		}
		i++;
	}
	
	return (tab);
}

//révéle toutes les cases contenant des 0 autour de la case cliquez, recursivement 
function reveal_all()
{
	var elem = document.getElementsByTagName("div");
	var td = document.getElementsByTagName("td");
	var i = 0;
	var res = new Array();
	var tab = get_tab_from_td();
	var height = parseInt(this.dataset.height);
	var width = parseInt(this.dataset.width);
	var nb_cell = width * height;
	var coor = {
		x:parseInt(this.dataset.x),
		y:parseInt(this.dataset.y)
	};
	var tmp_primary;
	var tmp_secondary;

	if (parseInt(this.innerHTML) == 0)
	{
		tmp_primary = get_null_around(tab ,height,width, coor);
		if (tmp_primary != null)
		{

			res.push(tmp_primary[0]);
			coor = array_in_coor(tmp_primary[0]);
			while (tmp_primary != null && coor != undefined)
				{
					tmp_primary.shift();
					tmp_secondary=  get_null_around(tab ,height,width, coor);
					tmp_primary = compare_for_no_double(tmp_primary, tmp_secondary);
					if (tmp_primary[0] != undefined)
					{
					tmp_primary = check_double(res, tmp_primary);
					}
					res.push(tmp_primary[0]);
					coor = array_in_coor(tmp_primary[0]);
				
					i++;

				}
		}
		reveal_from_tab(res, width);
		reveal_near(tab, res, width, height);
	}
	
}

//affiche les cases du tableau à proximité des cases révéler par reveal_all()
function reveal_near(tab, tab_res, width, height)
{
		var td  = document.querySelectorAll("td");
		var i = 0;
		var tmp = new Array();
		var res = new Array();

	while (i < tab_res.length -1)
	{
			
		var coor = array_in_coor(tab_res[i]);
		tmp =  get_not_bomb_around(tab ,height,width, coor);
		if (res == undefined)
			res = tmp;
		tmp = check_double(res, tmp);
		res = res.concat(tmp);
		i++;
	}
	reveal_from_tab(res, width);
}

//verifie la victoire , les divs qui sont pas sur les bombes sont cachées 
function check_win()
{
	var i = 0;
	var set = true;
	var div = document.getElementsByTagName("div");
	var td = document.getElementsByTagName("td");
	var res = document.getElementsByTagName("h2")[0];

	while (i < div.length)
	{

		if (td[i].dataset.bomb == 0 && !div[i].classList.contains("reveal"))
			set = false;
		else if(td[i].dataset.bomb == 1 && div[i].classList.contains("reveal"))
			set = false;
		i++;
	}
	if (set == true)
	{
		res.innerHTML = "YOU WIN";
		res.classList.add("win");
	}
	
}

//ajoute les evenements sur les bombes
function bomb_click()
{
	var i = 0;
	var td = document.getElementsByTagName("td");
	var div = document.getElementsByTagName("div");

	while (i < td.length)
	{
		if (td[i].dataset.bomb == 1)
		{
			td[i].addEventListener("click", function(){
				var res = document.getElementsByTagName("h2")[0];
				res.innerHTML = "YOU LOSE";
				res.classList.add("lose");
					show_bomb();
				this.classList.add("redbomb");
				remove_win();
				block_all();
			
			});
		}	
		else{
			td[i].addEventListener("click", function(){check_win();});
		}
		i++;
	}
}


//block les events si le joueur perd
function block_all()
{
	let i = 0;
	var	div = document.getElementsByTagName("div");
	var td = document.getElementsByTagName("td")

	while (i < div.length)
	{
		div[i].removeEventListener("click", function(){this.classList.add("reveal");});
		td[i].removeEventListener("click", function(){this.classList.add("white");});
		td[i].removeEventListener("click", reveal_all);
		div[i].removeEventListener("contextmenu", function(){this.classList.add("bomb");});
		div[i].removeEventListener('contextmenu', function(ev) {ev.preventDefault();return false;}, false);
		i++;
	}
}


//affiche les bombes quand le joueur perd
function show_bomb()
{
	var td = document.querySelectorAll("td");
	var div = document.querySelectorAll("div")

	for (var i = 0; i < td.length; i++)
	{
		if (td[i].dataset.bomb == 1)
		{
			td[i].classList.add("bomb");
			div[i].classList.add("reveal");
		}
	}

}


//enleve la verificaton de la victoire à chaque click de td 
 function remove_win()
 {
 	var i = 0;
 	var td = document.getElementsByTagName("td");

 	while (i < td.length)
	{
		if (td[i].dataset.bomb == 0)
			td[i].removeEventListener("click", function(){check_win();});
		i++;
	}
 }


var tab = [
    [false, true, true, false, false, true, false],
    [false, false, false, false, true, false, false],
    [false, true, true, false, false, false, true],
    [false, false, false, false, false, false, false],
    [false, false, false, false, false, false, false],
    [false, false, false, false, false, true, false],
    [false, false, true, false, false, true, false],
    [false, false, false, false, false, false, false],
    [false, false, false, false, false, false, false]
];


//function pour lancer le jeu
function start()
{
var height = document.getElementById("height").value;
var width = document.getElementById("width").value;
var nb_mine = document.getElementById("nb_mine").value;
var tab = generate_tab(height, width, nb_mine);

show_tab(tab, height, width);
add_click(tab, height, width);
bomb_click();
}


document.getElementById("submit").addEventListener("click", start);


