<?php namespace SintLucas\Portfolio;

use SintLucas\Core\Presenter;

class ItemPresenter extends Presenter {

	protected $fields = array(
		'id',
		'type',
		'media'
	);

	public function getMediaField()
	{
		return $this->model->media;
	}

}
