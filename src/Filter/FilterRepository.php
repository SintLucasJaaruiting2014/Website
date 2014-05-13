<?php namespace SintLucas\Filter;

use SintLucas\Core\EloquentRepository;

class FilterRepository extends EloquentRepository {

	public function __construct(Filter $model)
	{
		$this->model = $model;
	}

}
