<?php namespace SintLucas\Profile\Response;

use SintLucas\Rest\Response\AbstractResponse;

class NetworkListingResponse extends AbstractResponse {

	public function prepare($response)
	{
		$transformer = $this->app->make('SintLucas\Profile\Transformer\ProfileTransformer');

		return $this->collectionResource($response->profiles, $transformer);
	}

}
