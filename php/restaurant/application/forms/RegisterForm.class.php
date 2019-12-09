<?php

class RegisterForm extends Form{

	
	public function build()
	{
		$this->addFormField('LastName');
		$this->addFormField('FirstName');
		$this->addFormField('Address');
		$this->addFormField('City');
		$this->addFormField('ZipCode');
		$this->addFormField('Country');
		$this->addFormField('Phone');
		$this->addFormField('Email');
		$this->addFormField('Password');
		$this->addFormField('day');
		$this->addFormField('month');
		$this->addFormField('year');
	}

	public function register()
	{
		$db = new Database();
		$data = $db->queryOne('SELECT Id FROM user WHERE Email = ?', array($this->getFormFields()['Email']));
		if ($data == false)
		{	

			if ($this->getFormFields()['day'] < 10)
				$this->getFormFields()['day'] = '0'.$this->getFormFields()['day'];
			if ($this->getFormFields()['month'] < 10)
				$this->getFormFields()['month'] = '0'.$this->getFormFields()['month'];
			$BirthDate = $this->getFormFields()['year'] . '-' . $this->getFormFields()['month'] . '-' . $this->getFormFields()['day'];
			$hashedPassword = hash('sha256', $this->getFormFields()['Password']);
			$data = $db->executeSql('INSERT INTO user (LastName, FirstName, Address, City, ZipCode, Country, Phone, Email, Password, CreationTimestamp, BirthDate) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)',array($this->getFormFields()['LastName'], $this->getFormFields()['FirstName'], $this->getFormFields()['Address'], $this->getFormFields()['City'], $this->getFormFields()['ZipCode'], $this->getFormFields()['Country'], $this->getFormFields()['Phone'], $this->getFormFields()['Email'], $hashedPassword, $BirthDate));
			return true;
		}
		else{
			$this->setErrorMessage('Il existe déjà un compte utilisateur avec cette adresse e-mail');
			return false;
		}
	}
}