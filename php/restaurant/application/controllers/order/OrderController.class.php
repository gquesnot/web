<?php

class OrderController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
        $meals = Meal::getAllMeal();
        $order = Order::getOneOrderByUserIdNotCompleted($_SESSION['Id']);
        if ($order == false)
        {
            $order = Order::startNewOrder();
            

        }
        $_SESSION['OrderNotCompleted'] = $order->getId();
        return ['meals'=>$meals, 'order'=>$order];
        
        
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
    }
}