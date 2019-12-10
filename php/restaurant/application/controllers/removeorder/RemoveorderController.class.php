<?php

class RemoveorderController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
        $order = Order::getOneOrderById($queryFields['id']);
        var_dump($order);
        $orderLines = $order->getOrderLine();
        foreach($orderLines as $orderLine)
        {
            OrderLine::deleteOrderLine($orderLine->getId());
        }
        Order::deleteOrder($queryFields['id']);
        var_dump($order);        
        $http->redirectTo('../');
        
        
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