<?php namespace SintLucas\Profile\SocialMedia;

use SintLucas\Core\Presenter;

class AccountPresenter extends Presenter {

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
