<?php namespace SintLucas\School;

use SintLucas\Core\EloquentRepository;

class ProgramRepository extends EloquentRepository {

	public function __construct(Program $model)
	{
		$this->model = $model;
	}

}
