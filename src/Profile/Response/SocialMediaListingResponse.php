<?php namespace SintLucas\Profile\Response;

use SintLucas\Profile\Transformer\SocialMediaTransformer;
use SintLucas\Rest\Response\AbstractResponse;

class SocialMediaListingResponse extends AbstractResponse {

	public function prepare($response)
	{
		return $this->collectionResource($response->accounts, new SocialMediaTransformer);
	}

}
