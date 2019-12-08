<?php

class ContactController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
       
        
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
       $data = new RegisterForm();
       $data->build();
       $data->bind($formFields);
        return ['_form'=>$data];
    }
}