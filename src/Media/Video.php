<?php namespace SintLucas\Media;

use SintLucas\Core\Model;

class Video extends Model {

	protected $table = 'media_videos';

	public function item()
	{
		return $this->morphOne('SintLucas\Media\Item', 'resource', 'type', 'resource_id');
	}
}
