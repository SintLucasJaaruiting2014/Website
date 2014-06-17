<?php namespace SintLucas\Question\Response;

use SintLucas\Rest\Response\AbstractResponse;

class AnswerListingResponse extends AbstractResponse {

	public function prepare($response)
	{
		$transformer = $this->app->make('SintLucas\Question\Transformer\AnswerTransformer');

		return $this->collectionResource($response->answers, $transformer);
	}

}
