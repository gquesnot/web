<?php

class PaymentcompleteController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
        */

        $orders = Order::getOneOrderByUserIdNotCompleted($_SESSION['Id']);
            $_SESSION['OrderNotCompleted'] = $orders->getId();
            $orders->setTotalAmount($orders->getOrderLine());
            $orders->setTaxAmount($orders->getTotalAmount());
            $orders->update();
         unset($_SESSION['OrderNotCompleted']);

       
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