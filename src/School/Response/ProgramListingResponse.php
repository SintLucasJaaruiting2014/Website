<?php namespace SintLucas\School\Response;

use SintLucas\School\Transformer\ProgramTransformer;
use SintLucas\Rest\Response\AbstractResponse;

class ProgramListingResponse extends AbstractResponse {

	public function prepare($response)
	{
		return $this->collectionResource($response->programs, new ProgramTransformer);
	}

}
