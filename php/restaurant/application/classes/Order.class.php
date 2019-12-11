<?php
	
	class Order{
		use Hydrate;
		private $id;
		private $user_Id;
		private $totalAmount;
		private $taxRate;
		private $taxAmount;
		private $creationTimestamp;
		private $completeTimestamp;
		private $orderLine;

		//Set

		public function setUser_Id($id)
		{
			$this->user_Id = $id;
		}


		public function setId($id)
		{
			$this->id = $id;
		}
		public function setTotalAmount($orderLines)
		{

			if (gettype($orderLines) == 'array')
			{
			$tmp = 0;
			if ($orderLines == null)
				return null;
			foreach($orderLines as $orderLine)
			{
				$tmp += $orderLine->getQuantityOrdered() * $orderLine->getPriceEach();
			}
			$this->totalAmount = $tmp;
			}
			else
				$this->totalAmount = $orderLines;
		}
		public function setTaxRate($data)
		{
			$this->taxRate = $data;
		}
		public function setTaxAmount($data)
		{
			$this->taxAmount = $data * ($this->getTaxRate()/100);
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
		public function getId()
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

		public function getUser_Id()
		{
			return $this->user_Id;
		}

		public function setOrderLine($id)
		{
			$this->orderLine = OrderLine::getAllOrderLineByOrderId($id);
		}

		public static function startNewOrder()
		{
			$db = new Database();
			$db->executeSql('INSERT INTO `order` (User_Id, TaxRate, CreationTimestamp) VALUES(? , 20 , NOW())', array($_SESSION['Id']));
			$order = Order::getOneOrderByUserIdNotCompleted($_SESSION['Id']);
			return $order;
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

		public static function getOneOrderByUserIdNotCompleted($user_id)
		{
			$db = new Database();
			$data = $db->queryOne('SELECT * FROM `order` WHERE User_Id = ? AND CompleteTimestamp IS NULL', array($user_id));
			if ($data == false)
				return false;
			$tmp = new Order();
			$tmp->hydrate($data);
			$tmp->setOrderLine($tmp->getId());
			return $tmp;
		}


		public static function getOneOrderById($id)
		{
			$db = new Database();
			$data = $db->queryOne('SELECT * FROM `order` WHERE Id = ?', array($id));
			if ($data == false)
				return false;
			$tmp = new Order();
			$tmp->hydrate($data);
			$tmp->setOrderLine($tmp->getId());
			return $tmp;
		}

		public static function deleteOrder($id)
		{
			$db = new Database();
			var_dump($id);
			$db->executeSql('DELETE FROM `order` WHERE Id = ?', array($id));
		}


		public function update()
		{
			$db=  new Database();
			$query = $db->executeSql('UPDATE `order` SET TotalAmount = ?, TaxAmount = ?, CompleteTimestamp = NOW()  WHERE Id= ?', array($this->getTotalAmount(), $this->getTaxAmount(),$this->getId()));
		}


	}