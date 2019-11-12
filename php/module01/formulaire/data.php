<?php

    // Method : GET
    
    $email = $_GET["email"];
    $country = $_GET['country'];
    $firstname = $_GET['firstname'];
    
?>

<p> Données recues par le formulaire </p>

<ul>
    <li> Email : <?php echo $email; ?></li>
    <li> Pays : <?php echo $country; ?></li>
    <li> Prenom : <?php echo $firstname; ?></li>
</ul>