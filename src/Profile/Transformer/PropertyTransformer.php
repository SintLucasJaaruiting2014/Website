<?php namespace SintLucas\Profile\Transformer;

use League\Fractal\TransformerAbstract;
use SintLucas\Profile\Property;

class PropertyTransformer extends TransformerAbstract {

	protected $availableIncludes = array();

	public function transform(Property $profile)
	{
		return $profile->toArray();
	}

}
