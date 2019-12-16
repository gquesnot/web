<?php

class StripeController
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
        $orderLines = $order->getOrderLine();
        $line_items = array();
        $wwwUrl = 'http://localhost'.str_replace('index.php', 'application/www', $_SERVER['SCRIPT_NAME']);
        foreach ($orderLines as $orderLine)
        {
            $tmp = ['name'=> $orderLine->getMeal()->getName(),
                    'description'=> $orderLine->getMeal()->getDescription(),
                    // 'images'=> [$wwwUrl.'/images/meals/'.$orderLine->getMeal()->getPhoto()],
                    'amount'=> $orderLine->getPriceEach() *100,
                    'currency'=> 'eur',
                    'quantity'=>$orderLine->getQuantityOrdered()];
            $line_items[] = $tmp;
        }

    \Stripe\Stripe::setApiKey('sk_test_hAm282IxQWJiDa05VkNdBGOm002LBab0lC');

$session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => $line_items,
  'success_url' => 'http://localhost/dev/php/restaurant/index.php/paymentcomplete/?id='.$queryFields['id'],
  'cancel_url' => 'http://localhost/dev/php/restaurant/index.php/cancel',
]);
        $http->sendJsonResponse($session);
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