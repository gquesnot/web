<?php 
	include 'function.php';
/*	
	$directory = new Array();*/

	$src_1 = "&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;fr&quot;&gt;
	&lt;head&gt;
		&lt;title&gt;module03&lt;/title&gt;
		&lt;meta charset=&quot;utf-8&quot; /&gt;
		&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot; /&gt;
		&lt;script src=&quot;https://kit.fontawesome.com/93fd608975.js&quot;&gt;&lt;/script&gt;
		&lt;link href=&quot;https://fonts.googleapis.com/css?family=Oswald:300&amp;display=swap&quot; rel=&quot;stylesheet&quot;&gt;
			&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/style.css&quot; media=&quot;screen&quot; /&gt;
	&lt;/head&gt;
	&lt;body&gt;
		&lt;!--HEADER--&gt;
		&lt;header&gt;
			&lt;img src=&quot;img/logo.png&quot; alt=&quot;logo&quot;&gt;
			&lt;nav&gt;
				&lt;a href=&quot;#&quot;&gt;Location&lt;/a&gt; 
				&lt;a href=&quot;#&quot;&gt;ABOUT US&lt;/a&gt; 
				&lt;a href=&quot;#&quot;&gt;CONTACT&lt;/a&gt; 
			&lt;/nav&gt;
		&lt;/header&gt;
		&lt;!--MAIN CONTENT--&gt;
		&lt;main&gt;
			&lt;article&gt;
			&lt;h1&gt;&lt;i class=&quot;fab fa-pagelines&quot;&gt;&lt;/i&gt;WHO WE ARE&lt;/h1&gt;
			&lt;img src=&quot;img/who.jpg&quot; alt=&quot;who&quot;&gt;
			&lt;p&gt;Quisque sit amet ullamcorper felis. Duis consectetur purus libero, sed vehicula odio tempus a. Phasellus sit amet arcu rutrum, lobortis metus sed, sollicitudin tortor. Nulla at tincidunt nunc, et molestie libero.&lt;/p&gt;
				
			&lt;p&gt;Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum ut erat neque. Aliquam mattis a urna non interdum. Cras feugiat viverra convallis. Quisque quis leo fringilla, volutpat magna commodo, cursus diam.Proin venenatis vestibulum neque, sit amet euismod enim lobortis eget.Proin venenatis vestibulum neque, sit amet euismod enim lobortis.&lt;/p&gt;
			&lt;a href=&quot;#&quot; class=&quot;button&quot;&gt;Read more&lt;/a&gt;
			&lt;/article&gt;
			&lt;div class=&quot;clearfix&quot;&gt;&lt;/div&gt;
			&lt;article&gt;
			&lt;h1&gt;&lt;i class=&quot;fab fa-pagelines&quot;&gt;&lt;/i&gt;WHAT WE DO&lt;/h1&gt;
			&lt;img src=&quot;img/what.jpg&quot; alt=&quot;what&quot;&gt;
			&lt;p&gt;Quisque sit amet ullamcorper felis. Duis consectetur purus libero, sed vehicula odio tempus a. Phasellus sit amet arcu rutrum, lobortis metus sed, sollicitudin tortor. Nulla at tincidunt nunc, et molestie libero.&lt;/p&gt;
			&lt;p&gt; Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum ut erat neque. Aliquam mattis a urna non interdum. Cras feugiat viverra convallis. Quisque quis leo fringilla, volutpat magna commodo, cursus diam.&lt;/p&gt;
			&lt;p&gt; Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum ut erat neque. Aliquam mattis a urna non interdum. Cras feugiat viverra convallis. Quisque quis leo fringilla, volutpat magna commodo, cursus diam.&lt;/p&gt;
			&lt;ul&gt;
				&lt;li&gt;Lorem ipsum dolor sit amet&lt;/li&gt;
				&lt;li&gt;Consectetur adipisicing elit&lt;/li&gt;
				&lt;li&gt;sed do eiusmod tempor incididunt&lt;/li&gt;
				&lt;li&gt;ut labore et dolore magna aliqua&lt;/li&gt;
				&lt;li&gt;sed do eiusmod tempor incididunt&lt;/li&gt;
				&lt;li&gt;ut labore et dolore magna aliqua&lt;/li&gt;
			&lt;/ul&gt;
			&lt;a href=&quot;#&quot; class=&quot;button&quot;&gt;Read more&lt;/a&gt;
		&lt;/article&gt;
		&lt;div class=&quot;clearfix&quot;&gt;&lt;/div&gt;
		&lt;/main&gt;
		&lt;!--FOOTER--&gt;
		&lt;footer&gt;
			&lt;small id=&quot;licence&quot;&gt;
			&lt;a rel=&quot;license&quot; href=&quot;https://3wa.fr/propriete-materiel-pedagogique/&quot;&gt;&lt;img alt=&quot;Propriété de la 3W Academy&quot; style=&quot;border-width:0&quot; src=&quot;https://3wa.fr/wp-content/themes/3wa2015/img/logos/big.png&quot; /&gt;&lt;/a&gt;&lt;br /&gt;&lt;span&gt;Cet exercice&lt;/span&gt; de &lt;a href=&quot;https://3wa.fr&quot;&gt;3W Academy&lt;/a&gt; est mis à disposition &lt;a rel=&quot;license&quot; href=&quot;https://3wa.fr/propriete-materiel-pedagogique/&quot;&gt;pour l&apos;usage personnel des étudiants, Pas de Rediffusion - Attribution - Pas d&apos;Utilisation Commerciale - Pas de Modification - International&lt;/a&gt;.&lt;br /&gt;Les autorisations au-delà du champ de cette licence peuvent être obtenues auprès de &lt;a href=&quot;mailto:contact@3wa.fr&quot; rel=&quot;cc:morePermissions&quot;&gt;contact@3wa.fr&lt;/a&gt;. Les maquettes ont été réalisées par &lt;a href=&quot;http://www.justine-muller.fr&quot;&gt;Justine Muller&lt;/a&gt;.
		&lt;/small&gt;
		&lt;/footer&gt;
	&lt;/body&gt;
&lt;/html&gt;
";

	$dir = "site/";
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
           if ($file != '.' && $file != '..')
        	{
        		$directory[] = obj_file($dir.$file);
        	}
        }

        closedir($dh);
    }

  foreach ($directory as $dir)
  {
  	echo "src= ".$dir->get_src()." type= ".$dir->get_type()."<br>";
  	if ($dir->get_type() == "f")
  	{
  		
  		$src = file($dir->get_src());
  		/*$src_spec= htmlspecialchars($src);*/
  		foreach($src as $sr)
  		{
  			$src_spec[] = htmlspecialchars($sr);
  		}
 											
  	}
  }
  $css = file("site/css/style.css");
 /* $css = explode("", $css);*/



include 'index.phtml';