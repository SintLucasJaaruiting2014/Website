<?php namespace SintLucas\Media\Image\Response;

use SintLucas\Media\Image\Transformer\CropTransformer;
use SintLucas\Rest\Response\AbstractResponse;

class CropListingResponse extends AbstractResponse {

	public function prepare($response)
	{
		return $this->collectionResource($response->crops, new CropTransformer);
	}

}
