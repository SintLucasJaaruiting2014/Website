<?php namespace SintLucas\Profile\SocialMedia;

use InvalidArgumentException;

class Type {

	protected static $types = array();

	public static function set($types = array())
	{
		static::$types = $types;
	}

	public static function all()
	{
		return static::$types;
	}

	public static function get($key)
	{
		if( ! isset(static::$types[$key]))
		{
			throw new InvalidArgumentException("Invalid social media type [$key]");
		}

		return static::$types[$key];
	}

	public static function url($type, $username)
	{
		$config = static::get($type);

		$url = $config['template'];

		return str_replace('{username}', $username, $url);
	}

}
