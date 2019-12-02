	<?php
    include 'function.php';

  /*$html_pos = $_POST['html'];
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
    }*/
/*
  foreach ($directory as $dir)
  {
  	if ($dir->get_type() == "f")
  	{*/
  		
	$src = file_get_contents("site/index.html");
  $css = file_get_contents("site/css/style.css");
  $tmp_css = fopen('tmp/css/style.css', 'a+');
  $tmp_html = fopen('tmp/index.html', 'a+');
  
  $res = new StdClass;
  $tmp_html_length = strlen(file_get_contents('tmp/index.html'));
  $tmp_css_length = strlen(file_get_contents('tmp/css/style.css'));

  if ($tmp_css_length < strlen($css))
  {
    fwrite($tmp_css, $css[$tmp_css_length]);
     
  }
 
  if ($tmp_html_length < strlen($src))
  {
     fwrite($tmp_html, $src[$tmp_html_length]);
 
  }
 fclose($tmp_css);
  fclose($tmp_html);
 
  $src=  file('tmp/index.html');

  $css = file('tmp/css/style.css');


  foreach($src as $sr)
  {
    $src_spec[] = htmlspecialchars($sr);
  }

  $res->html = $src;
  $res->css = $css;
  $res->html_spec = $src_spec;

  echo json_encode($res);
/*
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
/*  $res->html_spec_content = htmlspecialchars($set);*/
  /*fwrite($tmp_html, $set);
  if ($i + 1  == strlen($src[$j]))
    { 
      $res->html_return = 1;
    }
  else
  {
    $res->html_return = 0;
    
    
  }

  $l = 0;
  $m = 0;
  $n = 0;
  $set = false;
  while($l < count($css) && $set == false)
  {
    while ($m < strlen($css[$l]) && $set == false)
    {

    for ($j = 0)


      if ($n == $css_pos)
        $set = $css[$l][$m];
      $m++;
      $n++;
     
    }
 
    $m = 0;
    $l++;
  }

  $res->css_content = $set;
  fwrite($tmp_css, $set); 
  if ($m +1 == strlen($css[$l]))
  {
    
    $res->css_return = 1;
    
  }
  else
  {
    $res->css_return = 0;

  }

  $res->html_pos = $html_pos+ 1;
  $res->css_pos = $css_pos+ 1;*/

