<?php namespace SintLucas\Media\Image\Response;

use SintLucas\Rest\Response\AbstractResponse;

class ImageListingResponse extends AbstractResponse {

	public function prepare($response)
	{
		$transformer = $this->app->make('SintLucas\Media\Image\Transformer\ImageTransformer');
		return $this->paginationResource($response->images, $transformer);
	}

}
