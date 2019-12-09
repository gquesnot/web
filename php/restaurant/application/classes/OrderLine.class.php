<?php
	class OrderLine{
	
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
		$datas = $db->query('SELECT * FROM orderline WHERE = Order_Id = ?', array($id));
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

}