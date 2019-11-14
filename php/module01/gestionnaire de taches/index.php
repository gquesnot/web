<!DOCTYPE html>
<html lang="fr">

<head>
    <title>TITRE DU PROJET</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/normalize.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
</head>

<body>
    <!--HEADER-->
    <header>
        <nav>
        </nav>
    </header>
    <!--MAIN CONTENT-->
    <main>
        <?php

		if (isset($_POST['tab']))
		{
			$tab = [];
			$result = [];
			$result_2 = [];
			$array = $_POST['tab'];
			//recup input checkbox for delete
			foreach ($array as $value)
			{
				$tab[] = intval($value);
			}
			//save csv
			if (($f = fopen("db.csv", "r")) !== FALSE)
				{
				while (($data = fgetcsv($f)) !== FALSE)
				{
					$result[] = $data;
				}
				fclose($f);
			}
			
			//copy only csv not deleted
			if (!empty($result))
			{
				$i = 0;
				$j = 0;	
				while ($i < count($result))
				{
					if (in_array($i, $tab))
					{
						$i++;
					}
					else
					{
						$result_2[$j] = $result[$i];
						$i++;
						$j++;
					}
				}
			}
			//write new array => csv
			if (($f = fopen("db.csv", "w")) !== FALSE)
			{
				if (!empty($result_2))
				{
					for ($i = 0; $i < count($result_2); $i++)
					{
						if ($result_2[$i] !== null)
						{
							fputcsv($f, $result_2[$i]);
						}
					}
				}
			fclose($f);
			}
		}
		?>
        <h1>Gestionnaire de tâches :-)</h1>
        <form action="index.php" method="post">
            <ul id="task">
                <?php
				$date  = Date('d-m-Y');
				$i = 0;
				if (($f = fopen("db.csv", "r"))!== FALSE)
				{
					while (($data = fgetcsv($f)) !== FALSE)
					{
						$result  = "<li><input name=\"tab[]\" id=\"tache".$i."\" type=\"checkbox\" value=\"".$i."\"><label for=\"tache".$i."\"class=\"";
						if ($data[3] === "Haute")
							$result .= "high\">";
						else if ($data[3] === "Normale")
							$result .= "normal\">";
						else
							$result .= "low\">";
						$result .= $data[0];
						if ($data[2] <= $date)
						{
							$result .= " <strong>- EN RETARD</strong>";
						}
						$result .= "</label>";
						if (empty($data[1]))
							$result .= "<p>Tâche sans description</p></li>";
						else
							$result .= "<p>".$data[1]."</p></li>";
						echo $result;
						$i++;
					}

				}
				?>
                <li><input type="submit" value="supprimer" id="supprimer"></li>
            </ul>
        </form>
        <form action="add.php" method="post">
            <fieldset>
                <legend>Informations sur la tâche</legend>
                <ul>
                    <li>
                        <label for="titre">Titre: </label>
                        <input name="titre" id="titre" type="text">
                    </li>
                    <li>
                        <label for="tache">Tâche: </label>
                        <textarea name="tache" id="tache"></textarea>
                    </li>
                    <li>
                        <label for="date">Date de fin: </label>
                        <select name="date_jour" id="date_jour"></select> /
                        <select name="date_mois" id="date_mois"></select> /
                        <select name="date_anne" id="date_anne"></select>
                    </li>
                    <li>
                        <label for="priorite">Priorité: </label>
                        <input type="radio" name="priorite" value="Basse"> Basse
                        <input type="radio" name="priorite" value="Normale"> Normale
                        <input type="radio" name="priorite" value="Haute"> Haute
                    </li>
                    <li><input type="submit" id="ajouter" value="ajouter"></li>
                </ul>
            </fieldset>
        </form>
        <script src="js/script.js"></script>
    </main>
    <!--FOOTER-->
    <footer>
    </footer>
</body>

</html>