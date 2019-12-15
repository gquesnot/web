<?php
	session_start();
	include 'class.php';


if (isset($_POST['email']) && isset($_POST['password']))
{
	$db = new Database();
	$data = $db->queryOne('SELECT * FROM utilisateur WHERE uti_email = ?', array($_POST['email']));
	if (password_verify($_POST['password'], $data['uti_password']))
	{
		$_SESSION['id']= $data['id'];
		$_SESSION['pseudo']= $data['uti_pseudo'];
		$_SESSION['nom']= $data['uti_nom'];
		$_SESSION['prenom']= $data['uti_prenom'];
		$_SESSION['email']= $data['uti_email'];
		$_SESSION['admin']= $data['uti_admin'];
		header('Location: index.php');
		exit();
	}
	else
	{

		header('Location: login.php');
		exit();
	}
}

















include 'header.phtml';
include 'login.phtml';
include 'footer.phtml';