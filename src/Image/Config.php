<?php  namespace SintLucas\Image;

class Config {

	protected $name;
	protected $width;
	protected $height;
	protected $crop;

	public function __construct($name, $width, $height, $crop = false)
	{
		$this->name   = $name;
		$this->width  = $width;
		$this->height = $height;
		$this->crop   = $crop;
	}

	public function __get($key)
	{
		if(property_exists($this, $key))
		{
			return $this->{$key};
		}
	}

}
