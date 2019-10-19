"use strict"


var tab = [[4, '.', '.', '.', '.', 8, '.', '.', 3],['.', '.', '.', '.', 7, '.', '.', '.', 9],['.', '.', '.', '.', 1, 6, '.', '.', '.'],[9, '.', '.', 3, '.', '.', '.', '.', '.'],['.', 6, '.', '.', '.', '.', 1, 7, '.'],['.', '.', '.', '.', '.', '.', '.', '.', '.'],['.', '.', '.', '.', '.', '.', '.', '.', 4],['.', '.', '.', 2, '.', '.', '.', '.', '.'],['.', 7, 5, '.', '.', '.', 6, '.', '.']];




function parseTab()
{
	var tab = new Array(9);
	var i = 0;
	var j = 0;
	var n = 0;
	var tmp = document.querySelectorAll("td");

	while (i < 9)
	{

		tab[i] = new Array(9);
		while (j < 9)
		{
			if (tmp[n].innerHTML != '<br>')
				tab[i][j] = parseInt(tmp[n].innerHTML);
			else
				tab[i][j] = '.';
			j++;
			n++;
		}
		j = 0;	
		i++;
	}
	console.log(n);
	console.log(tab);
	return (tab);
}


function showInTab(tab)
{
	var tmp;
	var tmp = document.querySelectorAll("td");
	var j = 0;
	var i = 0;
	var n = 81;

	while (j < 9)
	{
		while (i < 9)
		{
			if (tmp[n - 81].innerHTML != '<br>')
				tmp[n].classList.add("jaune");
			if(!isNaN(tab[j][i]))
			tmp[n].innerHTML = tab[j][i];
			i++;
			n++;
		}
		j++;
		i = 0;
	}
}



function sudoku()
{
	var index = 0;
	var tab2 = parseTab();

	resolve(tab2, index);
	showInTab(tab2);
	console.log(tab2);

}



function show_sudoku(tab)
{
var i = 0;
var j= 0;
document.write("<br/><br/>")
while (j < tab.length)
{
	i = 0;
	while (i < tab[j].length)
	{
		document.write(tab[j][i]+" ");
		i++;
	}
	document.write("<br/>");
	j++;
}
}

function is_safe(number, y, x, tab)
{
	var i = 0;
	while (i < 9)
	{
		if (tab[y][i] == number && i != x)
			return (false);
		i++;
	}
	i = 0;
	while (i <  9)
	{
		if (tab[i][x] == number && y != i)
			return (false);
		i++;
	}
	return(true);
}

function find_next(y, x, tab)
{
	var i = 0;
	var j = 0;

	while (j <  9)
	{
		while (i < 9)
		{
			if (tab[j][i] == '.')
				return ((j*9)+i);
			i++;
		}
		i = 0;
		j++;
	}
	return ((j*9)+i +1);
}


function resolve(tab, var1)
{
	var i = 1;
	var index = var1;

	index = find_next(Math.floor(index/9), index%9, tab) ;
	if (index >= 81)
		return (true);
	while (i <= 9)
	{
		if (is_safe(i, Math.floor(index/9), index%9, tab))
		{
			tab[Math.floor(index/9)][index%9]=i;
			if (resolve(tab, index + 1))
				return  (true);
		}


		i++;
	}
	tab[Math.floor(index/9)][index%9] = '.';
	return (false);
}



