<?php namespace SintLucas\Profile\Response;

use SintLucas\Rest\Response\AbstractResponse;

class ProfileListingResponse extends AbstractResponse {

	public function prepare($response)
	{
		$transformer = $this->app->make('SintLucas\Profile\Transformer\ProfileTransformer');

		return $this->paginationResource($response->profiles, $transformer);
	}

}
