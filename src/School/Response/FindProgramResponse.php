<?php namespace SintLucas\School\Response;

use SintLucas\School\Transformer\ProgramTransformer;
use SintLucas\Rest\Response\AbstractResponse;

class FindProgramResponse extends AbstractResponse {

	public function prepare($response)
	{
		return $this->itemResource($response->program, new ProgramTransformer);
	}

}
