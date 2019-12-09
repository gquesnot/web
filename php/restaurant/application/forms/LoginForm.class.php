<?php

class LoginForm extends Form{

	public function build()
	{
		$this->addFormField('Email');
		$this->addFormField('Password');
	 }

	 public function login()
	 {
	 	$db = new Database();
	 	$data = $db->queryOne('SELECT Password FROM user WHERE Email = ?', array($this->getFormFields()['Email']));
	 	if ($data != false)
	 	{
	 			$hashedPassword = hash('sha256', $this->getFormFields()['Password']);
	 		if ($hashedPassword ==  $data['Password'])
	 		{
	 			
	 			$user = User::getUserByMail($this->getFormFields()['Email']);
	 			$_SESSION['Id'] = $user->getId();
	 			$_SESSION['FirstName'] = $user->getFirstName();
	 			$_SESSION['LastName'] = $user->getLastName();
	 			$_SESSION['Email'] = $user->getEmail();
	 			$_SESSION['Address'] = $user->getAddress();
	 			$_SESSION['BirthDate'] = $user->getBirthDate();
	 			$_SESSION['City'] = $user->getCity();
	 			$_SESSION['ZipCode'] = $user->getZipCode();
	 			$_SESSION['Country'] = $user->getCountry();
	 			$_SESSION['Phone'] = $user->getPhone();
	 			$_SESSION['CreationTimestamp'] = $user->getCreationTimestamp();
	 			$_SESSION['LastLoginTimestamp'] = $user->getLastLoginTimestamp();
	 			$_SESSION['Admin'] = $user->getAdmin();
	 			return true;
	 		}
	 		else
	 		{
	 			$this->setErrorMessage('Mauvais mot de passe');
	 			return false;
	 		}
	 	}
	 	else
	 	{
	 		$this->setErrorMessage('Mauvaise Email');
	 		return false;
	 	}
	 }
}