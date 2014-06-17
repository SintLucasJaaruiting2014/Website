<?php namespace SintLucas\Image;

class Image {

	protected $filename;

	public function __construct($filename)
	{
		$this->filename = $filename;
	}

	public function __get($key)
	{
		if(in_array($key, array('path')))
		{
			return $this->{'get'.ucfirst($key)}();
		}
		elseif(property_exists($this, $key))
		{
			return $this->{$key};
		}
	}

	protected function getPath()
	{
		$base = storage_path('images/');

		return $base.$this->filename;
	}
}
