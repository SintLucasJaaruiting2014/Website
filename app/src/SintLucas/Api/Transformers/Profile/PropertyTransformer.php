<?php namespace SintLucas\Api\Transformers\Profile;

use League\Fractal\TransformerAbstract;
use SintLucas\Domain\Profile\Models\ProfileProperty;

class PropertyTransformer extends TransformerAbstract {

	/**
	 * List of resources possible to embed via this transformer
	 *
	 * @var array
	 */
	protected $availableEmbeds = array();

	/**
	 * Turn this item object into a generic array
	 *
	 * @return array
	 */
	public function transform(ProfileProperty $property)
	{
		return array(
			'id'     => $property->id,
			'filter' => $property->filter->label,
			'option' => $property->option->value
		);
	}

}
