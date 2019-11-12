<!DOCTYPE html>
<html>
<head>
    <title>bonjour</title>
</head>
<body>

<?php

    $mot= $_GET['mot'];
    $langue = $_GET['langue'];
    $set = true;
    $reponse = "";

    $dictionary =
    [
        'cat'    => 'chat',
        'dog'    => 'chien',
        'monkey' => 'singe',
        'sea'    => 'mer',
        'sun'    => 'soleil'
    ];

    if ($langue == 'anglais->francais')
    {
    foreach ($dictionary as $key => $value) {
    if ($key == $mot)
    {
        $reponse = $value;
        echo "La traduction ".$langue." de ".$mot." est ".$value;
        $set = false;
    }
    }
    if ($set == true)
    {
        echo "pas trouver";
    }
}
else if ($langue == "francais->anglais")
{
    foreach ($dictionary as $key => $value) {
    if ($value == $mot)
    {
        $reponse = $key;
        echo "La traduction  ".$langue." de ".$mot." est ".$key;
        $set = false;
    }
}
    if ($set == true)
    {
        echo "pas trouver";
    }

}
else
{
    echo "pas trouver";

}



  header('Location: index.php?reponse='.$reponse.'&mot='.$mot);
  exit();
?>
</body>
</html>