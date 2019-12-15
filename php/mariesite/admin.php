<?php
	include 'class.php';
	session_start();

	

	
	if ($_SESSION['admin'] == 1)
	{
		if(isset($_POST['type']) && isset($_POST['categorie']) && isset($_POST['nom']) && isset($_POST['description']))
		{

	

		var_dump($_FILES['img']);
		var_dump($_POST);
		var_dump(pathinfo($_FILES['img']['name']));
		$imgSize = getimagesize($_FILES["img"]["tmp_name"]); 
		$img_src = "";

		if ($_FILES['img']['name'] != '')
		{
			if (file_exists('img/'.$_POST['type'].'/'.$_POST['categorie'].'/'.$_FILES["img"]["name"]) == false)
			{
			$imgInfo = pathinfo($_FILES['img']['name']);
			$target_file = 'img/'.$_POST['type'].'/'.$_POST['categorie'].'/'.basename($_FILES['img']['name']);
			$extension = $imgInfo['extension'];

			
			 	if($extension == "JPG" || $extension == "png" || $extension == "jpeg" || $extension == "gif")
			 	{
			 		var_dump($target_file);

			 		var_dump( move_uploaded_file($_FILES["img"]["tmp_name"], $target_file));
			 		$img_src = $target_file;
			 		$pathName = 'img/'.$_POST['type'].'/'.$_POST['categorie'].'/';
			 		if ($extension == 'JPG' || $extension == 'jpeg')
			 			$img1 = imagecreatefromjpeg($pathName.$_FILES['img']['name']);
			 		else if ($extension ==  'png')
			 			$img1 = imagecreatefrompng($pathName.$_FILES['img']['name']);
			 		$target_file = $pathName.$imgInfo['filename'].'V0.'.$imgInfo['extension'];
					imageresolution($img1, 72,72);
					if ($extension == 'JPG' || $extension == 'jpeg')
			 			imagejpeg($img1, $target_file);
			 		else if ($extension == "png")
			 			imagepng($img1, $target_file);
			 		$name = $imgInfo['filename'].'V0.'.$imgInfo['extension'];
			 		$lowSrc = "";
			 		$fhdSrc = "";
			 		$hdSrc = "";
			 		if ($imgSize[1] > 1920)
			 		{
			 		changeImageSize($pathName, $name,1920, $extension);
			 		
			 		$fhdSrc= $pathName.$imgInfo['filename'].'V1920.'.$imgInfo['extension'];
			 		
			 		}
			 		if ($imgSize[1] > 1280)
			 		{
			 			changeImageSize($pathName, $name,1280, $extension);
			 			$hdSrc= $pathName.$imgInfo['filename'].'V1280.'.$imgInfo['extension'];
			 		}
			 		if ($imgSize[1] > 720)
			 		{
			 			changeImageSize($pathName, $name,720, $extension);
			 			$lowSrc= $pathName.$imgInfo['filename'].'V720.'.$imgInfo['extension'];
			 		}
			 		$name = $pathName.$name;
			 		$img = Image::insertImage($_POST['description'], $_POST['nom'], $name , $fhdSrc, $hdSrc, $lowSrc, Categorie::getOneCategorieByName($_POST['categorie']), Type::getOneTypeByName($_POST['type']));
			 	}
			 
		}
	}
	}
		$categories = Categorie::getAllCategorie();
		$types = Type::getAllType();
		

	}
	else
	{
		header('Location:index.php');
	}


function changeImageSize($src, $name, $maxWidth, $extension)
{
	
	echo $src.$name.'<br>';
	if ($extension == 'JPG' || $extension == 'jpeg')
		$img1 = imagecreatefromjpeg($src.$name);
	else if ($extension ==  'png')
		$img1 = imagecreatefrompng($src.$name);
	var_dump($imgSize= getimagesize($src.$name));
	var_dump($imgInfo = pathinfo($src.$name));

	$target_file = $src.$imgInfo['filename'].$maxWidth.".".$imgInfo['extension'];
	$ratio =  $maxWidth/$imgSize[0];
	$width = $maxWidth;
	$height = $imgSize[1]*$ratio;
	$img2= imagecreatetruecolor($width, $height);
	imagecopyresampled($img2, $img1, 0, 0, 0, 0, $width, $height, $imgSize[0], $imgSize[1]);
	
	if ($extension == 'JPG' || $extension == 'jpeg')
		imagejpeg($img2, $target_file);
	else if ($extension ==  'png')
		imagepng($img2, $target_file);
}





include 'header.phtml';
include 'admin.phtml';
include 'footer.phtml';