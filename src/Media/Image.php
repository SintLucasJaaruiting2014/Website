<?php namespace SintLucas\Media;

use SintLucas\Core\Model;

class Image extends Model {

	protected $table = 'media_images';

	protected $fillable = array('filename');

	public function crops()
	{
		return $this->hasMany('SintLucas\Media\Image\Crop');
	}
}
