<?php namespace SintLucas\Media\Image\Transformer;

use League\Fractal\TransformerAbstract;
use SintLucas\Media\Image\Crop;

class CropTransformer extends TransformerAbstract {

	protected $availableIncludes = array();
	public function transform(Crop $image)
	{
		return array(
			'id'     => $image->id,
			'key'    => $image->key,
			'x'      => $image->x,
			'y'      => $image->y,
			'width'  => $image->width,
			'height' => $image->height
		);
	}

}
