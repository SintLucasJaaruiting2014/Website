<?php namespace SintLucas\Profile;

class PropertyRepository {

	protected $model;

	public function __construct(Property $model)
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
