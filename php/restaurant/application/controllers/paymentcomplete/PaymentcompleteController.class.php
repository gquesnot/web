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

    \Stripe\Stripe::setApiKey('sk_test_hAm282IxQWJiDa05VkNdBGOm002LBab0lC');

$session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'name' => 'T-shirt',
    'description' => 'Comfortable cotton t-shirt',
    'images' => ['https://example.com/t-shirt.png'],
    'amount' => 500,
    'currency' => 'eur',
    'quantity' => 1,
  ],[
    'name' => 'S-shirt',
    'description' => 'Comfortable cotton t-shirt',
    'images' => ['https://example.com/t-shirt.png'],
    'amount' => 300,
    'currency' => 'eur',
    'quantity' => 1,
  ]],
  'success_url' => 'http://localhost/dev/php/restaurant/index.php/success?session_id={CHECKOUT_SESSION_ID}',
  'cancel_url' => 'http://localhost/dev/php/restaurant/index.php/cancel',
]);

        return ['session'=>$session];
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