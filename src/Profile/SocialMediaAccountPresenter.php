<?php namespace SintLucas\Profile;

use SintLucas\Core\Presenter;

class SocialMediaAccountPresenter extends Presenter {

	protected $fields = array(
		'id',
		'type',
		'url'
	);

	public function getUrlField()
	{
		$username = $this->model->username;
		$type = $this->model->type;

		return Type::url($type, $username);
	}

}
