<?php namespace SintLucas\Portfolio;

use InvalidArgumentException;

class Type {

	const WEBSITE = 1;
	const BOOK = 2;

	protected static $types = array(
		self::WEBSITE => 'Website',
		self::BOOK => 'Boek'
	);

	public static function all()
	{
		return static::$types;
	}

	public static function get($id)
	{
		if( ! isset(static::$types[$id]))
		{
			throw new InvalidArgumentException('Invalid portfolio type.');
		}

		return static::$types[$id];
	}

}
