<?php namespace SintLucas\Media;

use SintLucas\Core\Model;

class Video extends Model {

	protected $table = 'media_videos';

	protected $fillable = array(
		'type',
		'url'
	);
}
