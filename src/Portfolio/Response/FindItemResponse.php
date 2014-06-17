<?php namespace SintLucas\Portfolio\Response;

use SintLucas\Portfolio\Transformer\ItemTransformer;
use SintLucas\Rest\Response\AbstractResponse;

class FindItemResponse extends AbstractResponse {

	public function prepare($response)
	{
		return $this->itemResource($response->item, new ItemTransformer);
	}

}
