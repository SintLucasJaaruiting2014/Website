<?php namespace SintLucas\School;

use SintLucas\Core\EloquentRepository;

class ProgramRepository extends EloquentRepository {

	public function __construct(Program $model)
	{
		$this->model = $model;
	}

	public function getWithLocation()
	{
		return $this->model->with('location')->get();
	}

	public function findWithLocation($id)
	{
		return $this->model->with('location')->find($id);
	}

}
