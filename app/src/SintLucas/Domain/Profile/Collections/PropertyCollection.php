<?php namespace SintLucas\Domain\Profile\Collections;

use Illuminate\Support\Collection;

class PropertyCollection extends Collection {

	public function getByFilterId($filterId)
	{
		$properties = $this->filter(function($item) use($filterId)
		{
			return $item->filter_id == $filterId;
		});

		$options = $properties->map(function($property)
		{
			return $property->option;
		});

		return $options->count() > 0 ? $options : null;
	}

}
