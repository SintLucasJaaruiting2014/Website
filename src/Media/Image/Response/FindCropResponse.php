<?php namespace SintLucas\Media\Image\Response;

use SintLucas\Media\Image\Transformer\CropTransformer;
use SintLucas\Rest\Response\AbstractResponse;

class FindCropResponse extends AbstractResponse {

	public function prepare($response)
	{
		return $this->itemResource($response->crop, new CropTransformer);
	}

}
