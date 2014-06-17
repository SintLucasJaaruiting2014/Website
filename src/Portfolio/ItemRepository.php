<?php namespace SintLucas\Portfolio;

use SintLucas\Core\EloquentRepository;
use SintLucas\Profile\Profile;

class ItemRepository extends EloquentRepository {

	public function __construct(Item $model)
	{
		$this->model = $model;
	}

	public function getBy(Profile $profile)
	{
		return $this->model
			->where('profile_id', $profile->id)
			->get();
	}

}
