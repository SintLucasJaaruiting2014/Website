<?php namespace SintLucas\School;

use SintLucas\Core\EloquentRepository;

class LocationRepository extends EloquentRepository {

	public function __construct(Location $model)
	{
		$this->model = $model;
	}

}
