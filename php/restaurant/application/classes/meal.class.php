<?php


	class Meal{
		use Hydrate;

		private $id;
		private $name;
		private $photo;
		private $description;
		private $quantityInStock;
		private $buyPrice;
		private $salePrice;

		public function setId($id)
		{
			$this->id = $id;
		}

		public function setName($name)
		{
			$this->name = $name;
		}

		public function setPhoto($photo)
		{
			$this->photo = $photo;
		}

		public function setDescription($description)
		{
			$this->description = $description;
		}

		public function setQuantityInStock($quantity)
		{
			$this->quantityInStock = $quantity;
		}

		public function setBuyPrice($buyPrice)
		{
			$this->buyPrice = $buyPrice;
		}

		public function setSalePrice($salePrice)
		{
			$this->salePrice = $salePrice;
		}

		public function getId()
		{
			return $this->id;
		}

		public function getName()
		{
			return $this->name;
		}

		public function getPhoto()
		{
			return $this->photo;
		}

		public function getDescription()
		{
			return $this->description;
		}

		public function getQuantityInStock()
		{
			return $this->quantityInStock;
		}

		public function getBuyPrice()
		{
			return $this->buyPrice;
		}

		public function getSalePrice()
		{
			return $this->salePrice;
		}


		
		public static function getAllMeal()
		{
			$db = new Database();
			$datas = $db->query('SELECT * FROM meal');
			$array = array();
			foreach($datas as $data)
			{
				$tmp = new Meal();
				$tmp->hydrate($data);
				$array[] = $tmp;
			}
			return $array;
		}

		public static function getOneMeal($meal_id)
		{
			$db = new Database();
			$data = $db->query('SELECT * FROM meal WHERE Id = ?', array($meal_id));
			$tmp = new Order();
			$tmp->hydrate($data);
			return $tmp;
		}
}
