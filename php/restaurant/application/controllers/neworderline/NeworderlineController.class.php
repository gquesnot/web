<?php

class NeworderlineController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */


        OrderLine::deleteOrderLine($queryFields['id']);
        $orderline = OrderLine::getAllOrderLineByOrderIdForJson($queryFields['Order_Id']);
        $http->sendJsonResponse($orderline);
       
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
        $orderline = OrderLine::fillOrderLine($formFields['Order_Id'], $formFields['QuantityOrdered'], $formFields['Meal_Id'], $formFields['PriceEach']);

        $orderline->insert();
        $orderline = OrderLine::getAllOrderLineByOrderIdForJson($formFields['Order_Id']);
        $http->sendJsonResponse($orderline);
    }
}