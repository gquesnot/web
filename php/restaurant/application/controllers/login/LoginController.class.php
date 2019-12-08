<?php

class LoginController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */

        $user = new LoginForm();
        $user->build();
        return ['_form'=> $user];
       
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

    	$user = new LoginForm();
        $user->build();
        $user->bind($formFields);
        $user->login();
        if ($user->login() == true)
            $http->redirectTo('/');
        else
            return ['erreur'=>$user->getErrorMessage()];
    }
}