<?php namespace SintLucas\Core\Parsers;

use SintLucas\Core\Interfaces\ParserInterface;

class CsvParser implements ParserInterface {

	/**
	 * Parse the given source.
	 *
	 * @param  string $source
	 * @return mixed
	 */
	public function parse($source)
	{
		$source = trim($source, "\n");

		$results = array();
		foreach(explode("\n", $source) as $row)
		{
			$results[] = str_getcsv($row);
		}

		return $results;
	}

}
