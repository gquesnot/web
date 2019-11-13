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
    console.log(tab_mine);
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
    console.log(tab);
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

    console.log(x_length + "  " + y_length);



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
	console.log(elem.innerHTML);
	
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
		}

	}
	console.log(elem.innerHTML);
}



// generate_tab(9, 7, 10);




function add_click()
{
	var i = 0;
	var elem = document.getElementsByTagName("div");
	var td = document.getElementsByTagName("td")
	while (i < elem.length)
	{
		elem[i].addEventListener("click", function(){this.classList.add("reveal");});
		i++;
	}
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
 add_click();
add_bomb();
}


document.getElementById("submit").addEventListener("click", start);


