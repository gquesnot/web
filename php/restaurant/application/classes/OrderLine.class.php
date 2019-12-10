<?php
	class OrderLine{
	
	use Hydrate;
	private $id;
	private $quantityOrdered;
	private $meal_Id;
	private $order_Id;
	private $priceEach;
	private $meal;


	public function setId($id)
	{
		$this->id = $id;
	}
	public function getId() 
	{
		return $this->id; 
	}
	public function setQuantityOrdered($quantityOrdered)
	{
	 	$this->quantityOrdered = $quantityOrdered; 
	}
	public function getQuantityOrdered() 
	{
		return $this->quantityOrdered; 
	}
	public function setMeal_Id($meal_Id)
	{ 
		$this->meal_Id = $meal_Id; 
	}
	public function getMeal_Id() 
	{ 
		return $this->meal_Id; 
	}
	public function setOrder_Id($order_Id) 
	{ 
		$this->order_Id = $order_Id; 
	}
	public function getOrder_Id() 
	{ 
		return $this->order_Id; 
	}
	public function setPriceEach($priceEach) 
	{ 
		$this->priceEach = $priceEach; 
	}
	public function getPriceEach() 
	{ 
		return $this->priceEach; 
	}

	public function getMeal()
	{
		return $this->meal;
	}

	public function setMeal($meal_id)
	{
		$this->meal = Meal::getOneMeal($meal_id);
	}



	public function insert()
	{
		$db = new Database();
		$tmp = $db->query('SELECT * FROM orderline WHERE Meal_Id = ? AND Order_Id = ?', array($this->getMeal_Id(), $this->getOrder_Id()));
		if ($tmp == false)
			$db->executeSql('INSERT INTO orderline (QuantityOrdered, Meal_Id, Order_Id, PriceEach) VALUES (? ,? ,? ,?)', array($this->getQuantityOrdered(), $this->getMeal_Id(), $this->getOrder_Id(), $this->getPriceEach()));
		else
		{
			$quantity = $this->getQuantityOrdered() + $tmp[0]['QuantityOrdered'];
			$db->executeSql('UPDATE orderline SET QuantityOrdered = ? WHERE Meal_Id = ?', array($quantity,$this->getMeal_Id()));
		}
	}


	public static function getAllOrderLine()
	{
		$db = new Database();
		$datas = $db->query('SELECT * FROM orderline');
		$array = array();
		foreach($datas as $data)
		{
			$tmp = new Meal();
			$tmp->hydrate($data);
			$tmp->setMeal($tmp->getMeal_Id());
			$array[] = $tmp;
		}
		return $array;
	}

	public static function getAllOrderLineByOrderId($id)
	{
		$db = new Database();
		$datas = $db->query('SELECT * FROM orderline WHERE Order_Id = ?', array($id));
		$array = array();
		foreach($datas as $data)
		{
			$tmp = new OrderLine();
			$tmp->hydrate($data);
			$tmp->setMeal($tmp->getMeal_Id());
			$array[] = $tmp;
		}
		return $array;
	}



	public static function getAllOrderLineByOrderIdForJson($id)
	{
		$db = new Database();
		$datas = $db->query('SELECT *, orderline.Id as orderline_id FROM orderline  INNER JOIN meal on orderline.Meal_Id = meal.Id WHERE Order_Id = ?', array($id));
		return $datas;
	}

	public static function fillOrderLine($orderId, $quantity, $mealId, $priceEach)
	{
		$tmp = new OrderLine();
		$tmp->setQuantityOrdered($quantity);
		$tmp->setMeal_Id($mealId);
		$tmp->setOrder_Id($orderId);
		$tmp->setPriceEach($priceEach);
		return $tmp;
	}

	public static function deleteOrderLine($orderlineId)
	{
		$db = new Database();
		$db->executeSql('DELETE FROM orderline WHERE Id = ?', array($orderlineId));

	}
	

}