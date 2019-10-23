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
	var coor={
		'x':0,
		'y':0,
	};


	//var tab3 = tab2;
	console.log(tab2);
	//show_sudoku(tab2);
	//if (is_valid(tab2))
	//{	
		resolve(tab2, index);
		//resolve_reverse(tab3, 80);
		showInTab(tab2);
		console.log('-------------')
		console.log(tab2);
		//if (!sudoku_diff(tab2, tab3))
		//	alert("sudoku non valide: plusieur solutoion");
	//	if(!is_valid(tab2))
	//		alert("erreur resultat non valide");
	//	console.log(tab2);
	//}
	//else
		//alert("Sudoku invalid");
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


function check_square(number, y, x, tab)
{
	var i = 0;
	var j = 0;
	while (j <  3)
	{
		while (i < 3)
		{
			if(tab[y+j][x+i]== number)
				return (false);
			i++;
		}
		i = 0;
		j++;

	}
	return(true);
}


function get_coor(index)
{
	var coor={
		'x':0,
		'y':0,
	};

	coor.y= Math.floor(index/9);
	coor.x= index%9;

	return(coor);
}


function get_index(coor)
{
	return(coor.y*9+coor.x);

}

function is_safe(number, y, x, tab)
{
	var i = 0;


	while (i < 9)
	{
		if (tab[y][i] == number)
			return (false);
		i++;
	}
	i = 0;
	while (i <  9)
	{
		if (tab[i][x] == number)
			return (false);
		i++;
	}
	if (!check_square(number, y - y%3, x - x%3, tab))
		return (false);
	return(true);
}

function find_next(tab)
{
	var i = 0;
	var j = 0;
	var coor={
		'x':0,
		'y':0,
	};


	while (j <  9)
	{
		while (i < 9)
		{
			if (tab[j][i] == '.')
			{
				coor.y = j;
				coor.x= i;
				return (coor);
			}
			i++;
		}
		i = 0;
		j++;
	}
	coor.y = j;
	coor.x= i;
	return (coor);
}





function find_prev(y, x, tab)
{
	var i = 8;
	var j = 8;

	while (j >= 0)
	{
		while (i >= 0)
		{
			if (tab[j][i] == '.')
				return ((j*9)+i);
			i--;
		}
		i = 8;
		j--;
	}
	return ((j*9)+i +1);
}




function resolve(tab, index)
{
	var i = 1;

	
	if (index <= 80 && tab[Math.floor(index/9)][index%9] != '.')
		if (resolve(tab, index+1))
			return (true);
	if (index >= 81)
		return (true);
	while (i <= 9)
	{
		if (is_safe(i, Math.floor(index/9), index%9, tab))
		{	
			
			tab[Math.floor(index/9)][index%9]=i;
			if (resolve(tab, index+1))
				return  (true);
		}
		i++;
	}
	tab[Math.floor(index/9)][index%9] = '.';
	return (false);
}


function resolve_reverse(tab, var1)
{
	var i = 9;
	var index = var1;

	if (index = find_prev(Math.floor(index/9), index%9, tab) ;
	if (index == 0)
		return (true);
	while (i >= 0)
	{
		if (is_safe(i, Math.floor(index/9), index%9, tab))
		{
			tab[Math.floor(index/9)][index%9]=i;
			if (resolve_reverse(tab, index - 1))
				return  (true);
		}


		i--;
	}
	tab[Math.floor(index/9)][index%9] = '.';
	return (false);
}








function is_valid(tab)
{
	var i = 0;
	var j = 0;

	while (j < 9)
	{
		while (i < 9)
		{
			if (tab[j][i] != '.')
				if (!is_safe(tab[j][i], j , i , tab))
					return (false);
			i++;
		}
		i = 0;
		j++;
	}
	return (true);
}


function sudoku_diff(tab, tab2)
{
	var i = 0;
	var j = 0;
	while (j < 9)
	{
		while (i < 9)
		{
			if (tab[j][i] != tab2[j][i])
				return(false)
			i++;
		}
		i = 0;
		j++;
	}
	return (true);
}

