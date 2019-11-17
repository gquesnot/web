"use strict"


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



// generate_tab(9, 7, 10);




function add_click(tab, height, width)
{
	let i = 0;
	var elem = document.getElementsByTagName("div");
	var td = document.getElementsByTagName("td")

	while (i < elem.length)
	{

		elem[i].addEventListener("click", function(){this.classList.add("reveal");});
		td[i].addEventListener("click", reveal_all);

		i++;
	}
}



function get_null_around(tab, tab_null)
{

}




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





function array_remove(tab, index)
{
	var tmp = new Array();
	var j = 0;

	for(var j = 0; j < tab.length; j++)
	{
		if(j == index)
			j++;
		tmp.push(tab[j]);
		j++;

	}
	return (tmp);
}



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



function reveal_from_tab(tab, width)
{
	var elem = document.getElementsByTagName("div");
	var i = 0;

	while (tab[i] != null)
	{
		elem[tab[i][1]*width+tab[i][0]].classList.add("reveal");
		i++;
	}

}



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

function add_bomb()
{
	var i = 0;
	var td = document.getElementsByTagName("td");
	var div = document.getElementsByTagName("div");

	while (i < td.length)
	{
		if (td[i].dataset.bomb == 1)
			td[i].addEventListener("click", function(){
				var res = document.getElementsByTagName("h2")[0];
				res.innerHTML = "YOU LOSE";
				res.classList.add("lose");
				remove_win();
			});
			
		else{
			td[i].addEventListener("click", function(){check_win();});
		}
		i++;
	}
}


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

function start()
{
var height = document.getElementById("height").value;
var width = document.getElementById("width").value;
var nb_mine = document.getElementById("nb_mine").value;
var tab = generate_tab(height, width, nb_mine);

show_tab(tab, height, width);
 add_click(tab, height, width);
add_bomb();
}


document.getElementById("submit").addEventListener("click", start);


