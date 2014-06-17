<?php namespace SintLucas\Media\Image;

use Illuminate\Database\Eloquent\Model;

class Crop extends Model {

	protected $table = 'media_imagecrops';

	public function image()
	{
		return $this->belongsTo('SintLucas\Media\Image\Image');
	}
}
