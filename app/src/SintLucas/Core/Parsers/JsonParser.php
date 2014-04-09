<?php namespace SintLucas\Core\Parsers;

use SintLucas\Core\Interfaces\ParserInterface;

class JsonParser implements ParserInterface {

	/**
	 * Parse the given source.
	 *
	 * @param  string $source
	 * @return mixed
	 */
	public function parse($source)
	{
		return json_decode($source);
	}

}
