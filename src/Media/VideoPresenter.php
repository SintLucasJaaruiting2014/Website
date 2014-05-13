<?php namespace SintLucas\Media;

use SintLucas\Core\Presenter;

class VideoPresenter extends Presenter {

	protected $fields = array(
		'id',
		'media_type',
		'type',
		'url'
	);

	public function getMediaTypeField()
	{
		return 'video';
	}
}
