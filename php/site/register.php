<?php 
	
// 	$link = mysql_connect("localhost", "root", "troiswa");
// 	  or die("Impossible de se connecter : " . mysql_error());
// echo 'Connexion réussie';

$user = $_POST['user'];
$password = $_POST['password'];
$mail = $_POST['email'];
$set = true;



if ( preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $mail ) );
{
echo "L'adresse eMail est valide";
}
else
{
	
}
if ( preg_match ( " \^[a-zA-Z0-9_]{3,16}$\ " , $user ) )
{
echo "Le pseudo ou login est valide";
}
if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$#', $password)) {
        echo 'Mot de passe conforme';
	}
	
else {
      echo 'Mot de passe non conforme';
}



try
{
	$bdd = new PDO('mysql:host=localhost;dbname=user;charset=utf8', 'root', 'troiswa');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


$reponse = $bdd->query("SELECT user FROM user_info");
$set = true;

while ($donne = $reponse->fetch())
{
	echo $donne['user']."<br>";
	if ($donne['user'] == $_POST['user'])
		$set = false;
}
if ($set == true && $_POST['password'] != "")
{
	$reponse = $bdd->query("INSERT INTO user_info (user, password, date_creation) VALUES ('{$_POST['user']}', '{$_POST['password']}', CURRENT_TIMESTAMP)");
}
else
{
	echo "<br>pas enregistrer";
}




// $sql = "INSERT INTO user_info (user, password, date_creation) VALUES ('{$_POST['user']}', '{$_POST['password']}', CURRENT_TIMESTAMP)";
  
//   if ($link2->query($sql) === TRUE){
//   	   echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $link2->error;
// }

	
	
	

// 	// mysql_close($link);
// 	$link2->close();
?>