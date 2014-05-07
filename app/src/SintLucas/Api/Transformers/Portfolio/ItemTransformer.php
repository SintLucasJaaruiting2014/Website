<?php namespace SintLucas\Api\Transformers\Portfolio;

use League\Fractal\TransformerAbstract;
use SintLucas\Domain\Portfolio\Models\Item;

class ItemTransformer extends TransformerAbstract {

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
	public function transform(Item $item)
	{
		return array(
			'id'         => (int) $item->id,
			'type'       => $item->type->name,
			'media_type' => $item->media->type,
			'url'        => $item->media->value,
			'thumbnail'  => $item->media->thumbnail,
			'original'   => $item->media->original
		);
	}
}
