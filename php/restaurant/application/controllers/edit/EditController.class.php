<?php

class EditController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
        $months = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'];

         $user = User::getUserByIdForJson($_SESSION['Id']);
         $date = explode('-',$user['BirthDate']);
        $data = new RegisterForm();
        $data->bind($user);
         return ['_form'=>$data, 'months'=>$months, 'date'=>$date, 'password'=>$user['Password']];
        
       
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
        $months = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'];

        $data = new RegisterForm();
        $data->build();
        $data->bind($formFields);
        if ($data->update() == true)
            $http->redirectTo('../index.php/edit');
        else
            return ['_form'=>$data, 'erreur'=>$data->getErrorMessage(), 'months'=>$months];
    
       
    }
}