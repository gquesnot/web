'use strict'; // Mode strict du JavaScript

/*************************************************************************************************/
/* **************************************** DONNEES JEU **************************************** */
/*************************************************************************************************/

var difficulty;
var i = 1;
var perso1 = {
    nom: "knight",
    hp: 0,
    base_hp: 0,
};

var perso2 = {
    nom: "dragon",
    hp: 0,
    base_hp: 0,
};





/*************************************************************************************************/
/* *************************************** FONCTIONS JEU *************************************** */
/*************************************************************************************************/


function choseClasse() {
    var tmp = window.prompt("choisir un classe entre chevalier - voleur - mage");
    while (tmp != "chevalier" && tmp != "mage" && tmp != "voleur") {
        tmp = window.prompt("choisir un classe entre chevalier - voleur - mage");
    }
    if (tmp == "voleur" || tmp == "chevalier" || tmp == "mage") {
        if (tmp == "chevalier")
            perso1.nom = "knight";
        else
            perso1.nom = tmp;
    }
}


function chose_difficulty() {
    difficulty = window.prompt("Choisissez votre niveau: facile - normal - difficile");
    while (difficulty != "facile" && difficulty != "normal" && difficulty != "difficile") {
        difficulty = window.prompt("Choisissez votre niveau: facile - normal - difficile");
    }
    if (difficulty == "facile") {
        perso1.hp = 100 + lancerDes(10, 10);
        perso2.hp = 100 + lancerDes(5, 10);
    }
    if (difficulty == "normal") {
        perso1.hp = 100 + lancerDes(10, 10);
        perso2.hp = 100 + lancerDes(10, 10);
    }
    if (difficulty == "difficile") {
        perso1.hp = 100 + lancerDes(7, 10);
        perso2.hp = 100 + lancerDes(10, 10);
    }
    perso1.base_hp = perso1.hp;
    perso2.base_hp = perso2.hp;
}

function attackByDragon(degat) {

    if (difficulty == "facile")
        return (degat * (1 - (lancerDes(2, 6) / 100)));
    else if (difficulty == "difficile")
        return (degat * (1 + (lancerDes(1, 6) / 100)));
    else
        return (degat);
}

function classDamageModifier(degat) {
    if (perso1.nom == "voleur")
        return (degat * (1 + (lancerDes(1, 6) / 100)));
    else if (perso1.nom == "mage")
        return (degat * (1 + (lancerDes(1, 10) / 100)));
    else
        return (Math.floor(degat));
}

function classKnight(degat) {
    if (perso1.nom == "knight")
        return (degat * (1 - (lancerDes(1, 10) / 100)));
    else
        return (degat);

}



function attackByHero(degat) {

    if (difficulty == "facile")
        return (degat * (1 + (lancerDes(2, 6) / 100)));
    else if (difficulty == "difficile")
        return (degat * (1 - (lancerDes(1, 6) / 100)));
    else
        return (degat);
}

function round(i) {
    var degatDragon = Math.floor(classKnight(attackByDragon(lancerDes(10, 6))));
    var degatHero = Math.floor(classDamageModifier(attackByHero(lancerDes(10, 6))));

    if (degatDragon > degatHero) {
        perso1.hp -= degatDragon;
        if (perso1.hp < 0)
            perso1.hp = 0;
        document.write("<li class=\"round-log dragon-attacks\"><h2 class=\"subtitle\">Tour n°" + i + "</h2>");
        document.write("<img src=\"images/" + perso2.nom + "-winner.png\" alt=\"" + perso2.nom + "\">");
        document.write("<p>Le dragon prend l'initiative, vous attaque et vous inflige " + degatDragon + " points de dommage !</p>")
    } else {
        perso2.hp -= degatHero;
        if (perso2.hp < 0)
            perso2.hp = 0;
        document.write("<li class=\"round-log player-attacks\"><h2 class=\"subtitle\">Tour n°" + i + "</h2>");
        document.write("<img src=\"images/" + perso1.nom + "-winner.png\" alt=\"" + perso1.nom + "\">")
        document.write("<p>Vous êtes le plus rapide, vous attaquez le dragon et lui infligez " + degatHero + " points de dommage !</p>");

    }
    document.write("</li>");

}

function round_2(i){
    var degatDragon = Math.floor(classKnight(attackByDragon(lancerDes(10, 6))));
    var degatHero = Math.floor(classDamageModifier(attackByHero(lancerDes(10, 6))));
       degatDragon> degatHero ? perso1.hp -= degatDragon : perso2.hp -= degatHero;
    if (perso1.hp < 0)
        perso1.hp = 0;
    if (perso2.hp < 0)
        perso2.hp = 0;

    document.write("<li class=\"round-log ");
    document.write(degatDragon>degatHero? "dragon" : "player" + "-attacks\"><h2 class=\"subtitle\">Tour n°" + i + "</h2>");
    document.write("<img src=\"images/" + (degatDragon>degatHero ? perso2.nom : perso1.nom) + "-winner.png\" alt=\"" + (degatDragon>degatHero ? perso2.nom : perso1.nom) + "\">");
    document.write("<p>"+(degatDragon>degatHero ? ("Le dragon prend l'initiative, vous attaque et vous inflige " + degatDragon) : ("Vous êtes le plus rapide, vous attaquez le dragon et lui infligez " + degatHero)) + " points de dommage !</p>");
    document.write("</li>")

}






function game_state() {
    if (perso1.base_hp / 3 >= perso1.hp)
        document.write("<li class=\"game-state\"><figure><img src=\"images/" + perso1.nom + "-wounded.png\" alt=\"" + perso1.nom + "\">")
    else
        document.write("<li class=\"game-state\"><figure><img src=\"images/" + perso1.nom + ".png\" alt=\"" + perso1.nom + "\">");
    if (perso1.base_hp*0.75<= perso1.hp)
    	document.write("<img class=\"pv\" src=\"images/100player.png\"/><figcaption>" + perso1.hp + " PV</figcaption></figure>");
    else if(perso1.base_hp*0.50<= perso1.hp)
    	document.write("<img class=\"pv\" src=\"images/75player.png\"/><figcaption>" + perso1.hp + " PV</figcaption></figure>");
    else 
    	document.write("<img class=\"pv\" src=\"images/25player.png\"/><figcaption>" + perso1.hp + " PV</figcaption></figure>");
    





    if (perso2.base_hp / 3 >= perso2.hp)
        document.write("<figure><img src=\"images/dragon-wounded.png\" alt=\"Dragon\">");
    else
        document.write("<figure><img src=\"images/dragon.png\" alt=\"Dragon\">");

    if(perso2.base_hp*0.75<= perso2.hp)
      document.write("<img class=\"pv\" src=\"images/100dragon.png\"/><figcaption>" + perso2.hp + " PV</figcaption></figure></li>");
    else if(perso2.base_hp*0.50<= perso2.hp)
        document.write("<img class=\"pv\" src=\"images/75dragon.png\"/><figcaption>" + perso2.hp + " PV</figcaption></figure></li>");
    else
        document.write("<img class=\"pv\" src=\"images/25dragon.png\"/><figcaption>" + perso2.hp + " PV</figcaption></figure></li>");

}


function game_end() {
    if (perso1.hp == 0)
        document.write("<li class=\"game-end\"><p class=\"title\">Fin de la partie</p><p>Vous avez perdu le combat, le dragon vous a carbonisé !</p><img src=\"images/dragon-winner.png\" alt=\"Dragon\"></li>");
    else
        document.write("<li class=\"game-end\"><p class=\"title\">Fin de la partie</p><p>Vous avez gagné le combat, le dragon c'est fait destroy !</p><img src=\"images/" + perso1.nom + "-winner.png\" alt=\"" + perso1.nom + "\"></li>");
}



/*************************************************************************************************/
/* ************************************** CODE PRINCIPAL *************************************** */
/*************************************************************************************************/

choseClasse();
difficulty = chose_difficulty();
document.write("<ul><li class=\"title\">Que le combat commence !!</li>");
while (perso1.hp != 0 && perso2.hp != 0) {
    game_state();
    round_2(i);
    i++;
}
game_end();
document.write("</ul>");
