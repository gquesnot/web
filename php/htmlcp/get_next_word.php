	<?php


  $html_pos = $_POST['html'];
  $css_pos= $_POST['css'];
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

  $tmp_css = fopen('tmp/css/style.css', 'a+');
  $tmp_html = fopen('tmp/index.html', 'a+');

  $i = 0;
  $j = 0;
  $k = 0;
  while($j < str_len($src) && $k != $html_pos)
  {
    while ($i < str_len($src[$j]) && $k != $html_pos)
    {
      $i++;
      $k++;
    }
    $i = 0;
    $j++;
  }
  $res = new StdClass();
  if ($i + 1  == str_len($src[$j]))
    { 
      fwrite($tmp_html, $src[$j][$i].'\n'; 
      $res->html_content = $src[$j][$i].'<br>';
    }
  else
     $res->html_content = $src[$j][$i].'<br>';
   if ($i + 1  == str_len($src[$j]))
    $res->html_spec_content = htmlspecialchars($src[$j][$i]).'<br>';
  else
     $res->html_spec_content = htmlspecialchars($src[$j][$i]).'<br>';

  $l = 0;
  $m = 0;
  $n = 0;

  while($l < str_len($css) && $n != $css_pos)
  {
    while ($m < str_len($css[$l]) && $n != $css_pos)
    {
      $m++;
      $n++;
    }
    $m = 0;
    $l++;
  }

  if ($m +1 == strlen($css[$l]))
  {
    fwrite($tmp_css, $css[$l][$m].'\n'; 
    $res->css_content = $css[$l][$m].'<br>';
  }
  else
    $res->css_content = $css[$l][$m];

  $res->html_pos;
  $res->css_pos;


fclose($tmp_css);
fclose($tmp_html);