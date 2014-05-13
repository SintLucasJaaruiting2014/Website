<?php namespace SintLucas\User;

use SintLucas\Core\Presenter;

class UserPresenter extends Presenter {

	protected $fields = array(
		'id',
		'email',
		'first_name',
		'last_name'
	);

}
