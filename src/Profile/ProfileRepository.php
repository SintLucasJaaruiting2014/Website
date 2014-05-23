<?php namespace SintLucas\Profile;

use SintLucas\Core\EloquentRepository;

class ProfileRepository extends EloquentRepository {

	public function __construct(Profile $model)
	{
		$this->model = $model;
	}

	public function paginateRandom($seed, $perPage = 30)
	{
		$query = $this->model->newQuery();

		return $query->orderByRaw('RAND(?)', array($seed))->paginate($perPage);
	}

	public function loadRelation(Profile $profile, $relation)
	{
		return $profile->load($relation);
	}

}
