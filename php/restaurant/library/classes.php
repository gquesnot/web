<?php

spl_autoload_register(function ($className) {
    $className = lcfirst($className); // je passe la première lettre en minuscules = Article devient article
    if(is_file($className.'.class.php')) { // si j'ai un fichier class/article.class.php alors il est inclus
        require_once($className.'.class.php');
    }
    else if(is_file($className.'.trait.php')) { // si j'ai un fichier class/article.class.php alors il est inclus
        require_once($className.'.trait.php');
    }
});
