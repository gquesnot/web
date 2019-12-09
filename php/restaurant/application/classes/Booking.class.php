<?php

	class Booking{

		private $id;
		private $bookingDate;
		private $bookingTime;
		private $numberOfSeats;
		private $user_Id;
		private $creationTimestamp;

		public function setId($id) 
		{ 
			$this->id = $id; 
		}
		public function getId() 
		{
	 		return $this->id; 
		}
		public function setBookingDate($bookingDate) 
		{
			$this->bookingDate = $bookingDate; 
		}
		public function getBookingDate() 
		{
			return $this->bookingDate;
		}
		function setBookingTime($bookingTime)  
		{
			$this->bookingTime = $bookingTime;
		}
		public function getBookingTime() 
		{ 
			return $this->bookingTime; 
		}
		public function setNumberOfSeats($numberOfSeats) 
		{ 
			$this->numberOfSeats = $numberOfSeats; 
		}
		public function getNumberOfSeats() 
		{ 
			return $this->numberOfSeats; 
		}
		public function setUser_Id($user_Id) 
		{ 
			$this->user_Id = $user_Id; 
		}
		public function getUser_Id() 
		{ 
			return $this->user_Id; 
		}
		public function setCreationTimestamp($creationTimestamp) 
		{ 
			$this->creationTimestamp = $creationTimestamp; 
		}
		public function getCreationTimestamp() 
		{ 
			return $this->creationTimestamp; 
		}

		public static function getAllboocking()
		{
			$db = new Database();
			$datas = $db->query('SELECT * FROM booking');
			$array = array();
			foreach($datas as $data)
			{
				$tmp = new OrderLine();
				$tmp->hydrate($data);
				$array[] = $tmp;
			}
			return $array;
		}

		public static function getAllBookingByUserId($user_id)
		{
			$db = new Database();
			$datas = $db->query('SELECT * FROM booking WHERE User_Id = ?', array($user_id));
			$array = array();
			foreach($datas as $data)
			{
				$tmp = new OrderLine();
				$tmp->hydrate($data);
				$array[] = $tmp;
			}
			return $array;
		}

	}