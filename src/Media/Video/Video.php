<?php namespace SintLucas\Media\Video;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

	protected $table = 'media_videos';

	protected $fillable = array(
		'type',
		'url'
	);

	public function getTypeAttribute()
	{
		return 'video';
	}
}
