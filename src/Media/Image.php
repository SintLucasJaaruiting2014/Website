<?php namespace SintLucas\Media;

use SintLucas\Core\Model;

class Image extends Model {

	protected $table = 'media_images';

	public function crops()
	{
		return $this->hasMany('SintLucas\Media\Image\Crop');
	}

	public function item()
	{
		return $this->morphOne('SintLucas\Media\Item', 'resource', 'type', 'resource_id');
	}
}
