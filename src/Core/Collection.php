<?php namespace SintLucas\Core;

use Illuminate\Database\Eloquent\Collection as BaseCollection;

class Collection extends BaseCollection implements PresentableInterface {

	/**
	 * Get the collection of items as a plain array.
	 *
	 * @return array
	 */
	public function present()
	{
		$presenters = array_map(function($value)
		{
			return $value instanceof PresentableInterface ? $value->present() : $value;

		}, $this->items);

		return new PresenterCollection($presenters);
	}

}
