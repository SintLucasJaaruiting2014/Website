<?php namespace SintLucas\Api\Transformers\Portfolio;

use League\Fractal\TransformerAbstract;
use SintLucas\Domain\Portfolio\Models\Type;

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
