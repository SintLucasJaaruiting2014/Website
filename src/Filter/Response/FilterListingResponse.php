<?php namespace SintLucas\Filter\Response;

use SintLucas\Rest\Response\AbstractResponse;

class FilterListingResponse extends AbstractResponse {

	public function prepare($response)
	{
		$transformer = $this->app->make('SintLucas\Filter\Transformer\FilterTransformer');

		return $this->collectionResource($response->filters, $transformer);
	}

}
