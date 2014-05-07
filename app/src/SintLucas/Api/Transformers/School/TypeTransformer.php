<?php namespace SintLucas\Api\Transformers\School;

use League\Fractal\TransformerAbstract;
use SintLucas\Domain\School\Models\Type;

class TypeTransformer extends TransformerAbstract {

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
	public function transform(Type $type)
	{
		return $type->toArray();
	}

}
