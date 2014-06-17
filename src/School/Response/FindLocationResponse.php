<?php namespace SintLucas\School\Response;

use SintLucas\School\Transformer\LocationTransformer;
use SintLucas\Rest\Response\AbstractResponse;

class FindLocationResponse extends AbstractResponse {

	public function prepare($response)
	{
		return $this->itemResource($response->location, new LocationTransformer);
	}

}
