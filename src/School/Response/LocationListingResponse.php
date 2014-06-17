<?php namespace SintLucas\School\Response;

use SintLucas\School\Transformer\LocationTransformer;
use SintLucas\Rest\Response\AbstractResponse;

class LocationListingResponse extends AbstractResponse {

	public function prepare($response)
	{
		return $this->collectionResource($response->locations, new LocationTransformer);
	}

}
