<?php namespace SintLucas\Core\Parsers;

use SintLucas\Core\Interfaces\ParserInterface;
use Symfony\Component\Yaml\Yaml;

class YamlParser implements ParserInterface {

	/**
	 * Parse the given source.
	 *
	 * @param  string $source
	 * @return mixed
	 */
	public function parse($source)
	{
		return Yaml::parse($source);
	}

}
