<?php namespace SintLucas\Profile;

use SintLucas\Core\EloquentRepository;

class SocialMediaAccountRepository extends EloquentRepository {

	public function __construct(SocialMediaAccount $model)
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
