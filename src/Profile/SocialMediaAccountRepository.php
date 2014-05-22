<?php namespace SintLucas\Profile;

use SintLucas\Core\EloquentRepository;

class SocialMediaAccountRepository extends EloquentRepository {

	public function __construct(SocialMediaAccount $model)
	{
		$this->model = $model;
	}

	public function getForProfile(Profile $profile)
	{
		return $profile->socialMediaAccounts;
	}

}
