<?php namespace SintLucas\Core\Interfaces;

interface ParserInterface {

	/**
	 * Parse the given source.
	 *
	 * @param  string $source
	 * @return mixed
	 */
	public function parse($source);

}
