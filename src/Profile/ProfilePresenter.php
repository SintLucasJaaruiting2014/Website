<?php namespace SintLucas\Profile;

use SintLucas\Core\Presenter;

class ProfilePresenter extends Presenter {

	protected $fields = array(
		'id',
		'year',
		'email',
		'location',
		'website',
		'quote',
		'program',
		'user',
		'socialMedia'
	);

}
