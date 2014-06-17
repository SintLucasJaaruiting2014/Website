<?php namespace SintLucas\Profile\Response;

use SintLucas\Profile\Transformer\PropertyTransformer;
use SintLucas\Rest\Response\AbstractResponse;

class PropertyListingResponse extends AbstractResponse {

	public function prepare($response)
	{
		return $this->collectionResource($response->properties, new PropertyTransformer);
	}

}
