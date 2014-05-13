<?php namespace SintLucas\Media\Crop;

use SintLucas\Core\Model;

class Crop extends Model {

	protected $table = 'media_imagecrops';

	public function image()
	{
		return $this->belongsTo('SintLucas\Media\Image');
	}
}
