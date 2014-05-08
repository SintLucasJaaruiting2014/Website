<?php namespace SintLucas\Profile;

use SintLucas\Core\EloquentRepository;

class ProfileRepository extends EloquentRepository {

	public function __construct(Profile $model)
	{
		$this->model = $model;
	}

}
