<?php namespace SintLucas\Profile;

use Illuminate\Pagination\Environment;
use SintLucas\Core\EloquentRepository;

class ProfileRepository extends EloquentRepository {

	protected $paginator;

	public function __construct(Profile $model, Environment $paginator)
	{
		$this->model     = $model;
		$this->paginator = $paginator;
	}

	public function paginateRandom($seed, $page = 1, $perPage = 72)
	{
		$query = $this->model->with(array(
			'program.location',
			'picture'
		));

		$skip = ($page - 1) * $perPage;
		$profiles = $query->orderByRaw('RAND(?)', array($seed))
			->skip($skip)
			->take($perPage)
			->get();

		$profiles->load('properties');

		$total = $this->model->count();

		return $this->paginator->make($profiles->all(), $total, $perPage);
	}

	public function getRandom($limit)
	{
		$query = $this->model->with(array(
			'program.location',
			'picture'
		));

		return $query->orderByRaw('RAND()')->limit($limit)->get();
	}

	public function loadRelation(Profile $profile, $relation)
	{
		return $profile->load($relation);
	}

}
