<?php namespace SintLucas\Portfolio\Response;

use SintLucas\Portfolio\Transformer\ItemTransformer;
use SintLucas\Rest\Response\AbstractResponse;

class ItemListingResponse extends AbstractResponse {

	public function prepare($response)
	{
		return $this->collectionResource($response->items, new ItemTransformer);
	}

}
