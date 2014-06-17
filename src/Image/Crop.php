<?php namespace SintLucas\Image;

class Crop {

	protected $x;
	protected $y;
	protected $width;
	protected $height;

	public function __construct($x, $y, $width, $height)
	{
		$this->x      = $x;
		$this->y      = $y;
		$this->width  = $width;
		$this->height = $height;
	}

	public function __get($key)
	{
		if(property_exists($this, $key))
		{
			return $this->{$key};
		}
	}
}
