<?php namespace SintLucas\Media;

use SintLucas\Core\Presenter;

class ImagePresenter extends Presenter {

	protected $fields = array(
		'id',
		'media_type',
		'filename'
	);

	public function getMediaTypeField()
	{
		return 'image';
	}

}
