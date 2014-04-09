<?php namespace SintLucas\Core;

use Illuminate\Support\Manager;
use SintLucas\Core\Parsers\CsvParser;
use SintLucas\Core\Parsers\JsonParser;
use SintLucas\Core\Parsers\YamlParser;

class ParserManager extends Manager {

	/**
	 * Create a CsvParser instance.
	 *
	 * @return \SintLucas\Core\Parsers\CsvParser
	 */
	public function createCsvDriver()
	{
		return new CsvParser();
	}

	/**
	 * Create a JsonParser instance.
	 *
	 * @return \SintLucas\Core\Parsers\JsonParser
	 */
	public function createJsonDriver()
	{
		return new JsonParser();
	}

	/**
	 * Create a YamlParser instance.
	 *
	 * @return \SintLucas\Core\Parsers\YamlParser
	 */
	public function createYamlDriver()
	{
		return new YamlParser();
	}

}
