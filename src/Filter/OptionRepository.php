<?php namespace SintLucas\Filter;

use SintLucas\Core\EloquentRepository;

class OptionRepository extends EloquentRepository {

	public function __construct(Option $model)
	{
		$this->model = $model;
	}

}
