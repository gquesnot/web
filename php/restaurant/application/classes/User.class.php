<?php 

	class User{
		use Hydrate;
		//user
		private $id;
		private $firstName;
		private $lastName;
		private $email;
		private $password;
		private $birthDate;
		private $address;
		private $city;
		private $zipCode;
		private $country;
		private $phone;
		private $creationTimestamp;
		private $lastLoginTimestamp;
		private $admin;

		//class Order et class Booking 
		private $order;
		private $booking;



		//SET
		public function setId($id)
		{
			$this->id = $id;
		}
		public function setFirstName($data)
		{
			$this->firstName = $data;
		}
		public function setLastName($data)
		{
			$this->lastName = $data;
		}
		public function setEmail($data)
		{
			$this->email = $data;
		}
		public function setPassword($data)
		{
			$this->password = $data;
		}
		public function setBirthDate($data)
		{
			$this->birthDate = $data;
		}
		public function setAddress($data)
		{
			$this->address = $data;
		}
		public function setCity($data)
		{
			$this->city = $data;
		}
		public function setZipCode($data)
		{
			$this->zipCode = $data;
		}
		public function setCountry($data)
		{
			$this->country = $data;
		}
		public function setPhone($data)
		{
			$this->phone = $data;
		}
		public function setCreationTimestamp($data)
		{
			$this->creationTimestamp = $data;
		}
		public function setLastLoginTimeStamp($data)
		{
			$this->lastLoginTimeStamp = $data;
		}
		public function setAdmin($data)
		{
			$this->admin = $data;
		}
		


		//GET
		public function getId()
		{
			return $this->id;
		}

		public function getFirstName()
		{
			 return $this->firstName;
		}
		public function getLastName()
		{
			 return $this->lastName;
		}
		public function getEmail()
		{
			 return $this->email;
		}
		public function getPassword()
		{
			 return $this->password;
		}
		public function getBirthDate()
		{
			return $this->birthDate;
		}
		public function getAddress()
		{
			return $this->address;
		}
		public function getCity()
		{
			return $this->city;
		}
		public function getZipCode()
		{
			return $this->zipCode;
		}
		public function getCountry()
		{
			return $this->country;
		}
		public function getPhone()
		{
			return $this->phone;
		}
		public function getCreationTimestamp()
		{
			return $this->creationTimestamp;
		}
		public function getLastLoginTimeStamp()
		{
			return $this->lastLoginTimeStamp;
		}
		public function getAdmin()
		{
			return $this->admin;
		}


		public function getOrder()
		{
			return $this->order;
		}

		public function setOrder($user_id)
		{
			$this->order = Order::getAllOrderByUserId($user_id);
		}


		public function getBooking()
		{
			return $this->booking;
		}

		public function setBooking($id)
		{
			$this->booking = Booking::getAllBookingByUserId($id);
		}


		public static function getUserByMail($email)
		{
			$db = new Database();
			$data = $db->queryOne('SELECT * FROM user WHERE Email = ?', array($email));
			$tmp = new User();
			$tmp->hydrate($data);
			$tmp->setOrder($tmp->getId());
			$tmp->setBooking($tmp->getId());
			return $tmp;
		}

		public static function getUserById($id)
		{
			$db = new Database();
			$data = $db->queryOne('SELECT * FROM user WHERE Id = ?', array($id));
			$tmp = new User();
			$tmp->hydrate($data);
			$tmp->setOrder($tmp->getId());
			$tmp->setBooking($tmp->getId());
			return $tmp;
		}

		public static function getUserByIdForJson($id)
		{

			$db = new Database();
			$data = $db->queryOne('SELECT * FROM user WHERE Id = ?', array($id));
			return $data;
		}


		public static function getAllUser()
		{
			$db = new Database();
			$datas = $db->queryOne('SELECT * FROM user');
			$array = array();
			foreach ($datas as $data)
			{
				$tmp = new User();
				$tmp->hydrate($data);
				$tmp->setOrder($tmp->getId());
				$tmp->setBooking($tmp->getId());
				$array[] = $tmp;
			}
			
			return $array;
		}

		public function isAdmin()
		{
			if ($this->admin == 1)
				return true;
			return false;
		}







	}