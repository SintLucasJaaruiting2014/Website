<?php namespace SintLucas\Core;

use Illuminate\Support\Collection as BaseCollection;
use Illuminate\Support\Contracts\ArrayableInterface;

class PresenterCollection extends BaseCollection {

	/**
	 * Get the collection of items as a plain array.
	 *
	 * @return array
	 */
	public function toArray()
	{
		return array_map(function($value)
		{
			return $value instanceof ArrayableInterface ? $value->toArray() : $value;

		}, $this->items);
	}

}
