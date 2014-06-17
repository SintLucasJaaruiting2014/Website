<?php namespace SintLucas\Portfolio\Transformer;

use League\Fractal\TransformerAbstract;
use SintLucas\Portfolio\Item;

class ItemTransformer extends TransformerAbstract {

	protected $availableIncludes = array();

	public function transform(Item $item)
	{
		return array(
			'id' => (int) $item->id,
			'type' => $item->type,
			$item->media->type => $item->media->toArray()
		);
	}

}
