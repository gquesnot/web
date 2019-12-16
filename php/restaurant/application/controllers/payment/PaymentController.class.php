<?php

class PaymentController
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
            $date= date("Y-m-d H:i:s");
        // $orders = Order::getOneOrderById($_SESSION['OrderNotCompleted']);
        return ['orders'=>$orders, 'orderLines'=>$orders->getOrderLine(), 'date'=>$date];
       
        
        
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