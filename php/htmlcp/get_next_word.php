	<?php
    include 'function.php';

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
  $set = false;
  while($j < count($src) && $set == false)
  {
    while ($i < strlen($src[$j]) && $set == false)
    {
      if ($k == $html_pos)
        $set = $src[$j][$i];
     
      $i++;
      $k++;
    }
    $i = 0;
    $j++;
  }

  $res = new StdClass();
  $res->html_content = $set;
  $res->html_spec_content = htmlspecialchars($set);
  if ($i + 1  == strlen($src[$j]))
    { 
      fwrite($tmp_html, $set.'<br>'); 
      $res->html_return = 1;
    }
  else
  {
    $res->html_return = 0;
    fwrite($tmp_html, $set);
    
  }

  $l = 0;
  $m = 0;
  $n = 0;
  $set = false;
  while($l < count($css) && $set == false)
  {
    while ($m < strlen($css[$l]) && $set == false)
    {

      if ($n == $css_pos)
        $set = $css[$l][$m];
      $m++;
      $n++;
     
    }
 
    $m = 0;
    $l++;
  }

  $res->css_content = $set;
  if ($m +1 == strlen($css[$l]))
  {
    fwrite($tmp_css, $set); 
    $res->css_return = 1;
    
  }
  else
  {
    $res->css_return = 0;
  }

  $res->html_pos = $html_pos+ 1;
  $res->css_pos = $css_pos+ 1;
  fclose($tmp_css);
  fclose($tmp_html);
  echo json_encode($res);
