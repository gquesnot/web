'use strict';   // Mode strict du JavaScript

/*************************************************************************************************/
/* *********************************** FONCTIONS UTILITAIRES *********************************** */
/*************************************************************************************************/

function lancerDes(nbDes, nbFaces) {
  var nombre = 0;

  for(var i = 1; i <= nbDes; i++) {
    var random = Math.floor(Math.random()*nbFaces)+1;
    nombre += random;
  }

  return nombre;
}

