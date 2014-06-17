<?php namespace SintLucas\School\Transformer;

use League\Fractal\TransformerAbstract;
use SintLucas\School\Location;

class LocationTransformer extends TransformerAbstract {

	public function transform(Location $location)
	{
		return array(
			'id'   => $location->id,
			'name' => $location->name
		);
	}

}
