<?php namespace SintLucas\Media\Image;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	protected $table = 'media_images';

	protected $fillable = array('filename');

	public function getTypeAttribute()
	{
		return 'image';
	}

	public function getPathAttribute()
	{
		return storate_path('images/').$this->filename;
	}

	public function crops()
	{
		return $this->hasMany('SintLucas\Media\Image\Crop');
	}
}
