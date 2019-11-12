  
<?php

	$sens= $_POST['sens'];
	$mot = $_POST['mot'];
	$set = true;

  $dictionary =
    [
        'cat'    => 'chat',
        'dog'    => 'chien',
        'monkey' => 'singe',
        'sea'    => 'mer',
        'sun'    => 'soleil'
    ];

    if ($sens == 'anglais->francais')
    {
    foreach ($dictionary as $i => $value) {
    if ($i == $mot)
    {
    	echo "La traduction de ".$sens." est de ".$value;
    	$set = false;
    }


	}
	if ($set == true)
		echo "pas trouver";
}
else if ($sens == "francais->anglais")
{

}
?>