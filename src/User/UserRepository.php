<?php namespace SintLucas\User;

use SintLucas\Core\EloquentRepository;

class UserRepository extends EloquentRepository {

	public function __construct(User $model)
	{
		$this->model = $model;
	}

}
