<?php
	
	class Order{

		private $id;
		private $totalAmount;
		private $taxRate;
		private $taxAmount;
		private $creationTimestamp;
		private $completeTimestamp;
		private $orderLine;

		//Set
		public function setId($id)
		{
			$this->id = $id;
		}
		public function setTotalAmount($data)
		{
			$this->totalAmount = $data;
		}
		public function setTaxRate($data)
		{
			$this->taxRate = $data;
		}
		public function setTaxAmount($data)
		{
			$this->taxAmount = $data;
		}
		public function setCreationTimestamp($data)
		{
			$this->creationTimestamp = $data;
		}
		public function setCompleteTimestamp($data)
		{
			$this->completeTimestamp = $data;
		}

		//Get
		public function getId($id)
		{
			return $this->id;
		}
		public function getTotalAmount()
		{
			return $this->totalAmount;
		}
		public function getTaxRate()
		{
			return $this->taxRate;
		}
		public function getTaxAmount()
		{
			return $this->taxAmount;
		}
		public function getCreationTimestamp()
		{
			return $this->creationTimestamp;
		}
		public function getCompleteTimestamp()
		{
			return $this->completeTimestamp;
		}

		public function getOrderLine()
		{
			return $this->orderLine;
		}

		public function setOrderLine($id)
		{
			$this->orderLine = OrderLine::getAllOrderLineByOrderId($id);
		}

		public static function getAllOrder()
		{
			$db = new Database();
			$datas = $db->query('SELECT * FROM `order`');
			$array = array();
			foreach ($datas as $data)
			{
				$tmp = new Order();
				$tmp->hydrate($data);
				$tmp->setOrderLine($tmp->getId());
				$array[] = $tmp;
			}
			return $array;
		}
	
		public static function getAllOrderByUserId($usr_id)
		{
			$db = new Database();
			$datas = $db->query('SELECT * FROM `order` WHERE User_Id = ?', array($usr_id));
			$array = array();
			foreach($datas as $data)
			{
				$tmp = new Order();
				$tmp->hydrate($data);
				$tmp->setOrderLine($tmp->getId());
				$array[] = $tmp;
			}
			return $array;
		}


		public static function getOneOrderById($id)
		{
			$db = new Database();
			$data = $db->query('SELECT * FROM order WHERE Id = ?', array($id));
			$tmp = new Order();
			$tmp->hydrate($data);
			$tmp->setOrderLine($tmp->getId());
			return $tmp;

		}
	}