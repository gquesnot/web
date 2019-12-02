<?php



class File{
	
	public $src;
	public $type;
	public $content;

	function set_src($src)
	{
		$this->src = $src;
	}
	function get_src()
	{
		return $this->src;
	}
	function set_type($type)
	{
		$this->type = $type;
	}
	function get_type()
	{
		return $this->type;
	}

}



function obj_file($file_src)
{
	$file = new File();
	$file->set_src($file_src);
	if (is_dir($file_src))
		$file->set_type("d");
	else
		$file->set_type("f");
	return $file;
}