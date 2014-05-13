<?php namespace SintLucas\Profile\SocialMedia;

use SintLucas\Core\EloquentRepository;

class AccountRepository extends EloquentRepository {

	public function __construct(Account $model)
	{
		$this->model = $model;
	}

}
