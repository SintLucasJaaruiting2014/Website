<?php namespace SintLucas\Filter\Response;

use SintLucas\Rest\Response\AbstractResponse;

class OptionListingResponse extends AbstractResponse {

	public function prepare($response)
	{
		$transformer = $this->app->make('SintLucas\Filter\Transformer\OptionTransformer');

		return $this->collectionResource($response->options, $transformer);
	}

}
