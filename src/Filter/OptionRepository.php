<?php namespace SintLucas\Filter;

use SintLucas\Core\EloquentRepository;

class OptionRepository extends EloquentRepository {

	public function __construct(Option $model)
	{
		$this->model = $model;
	}

	public function getBy(Filter $filter)
	{
		return $this->model
			->where('filter_id', $filter->id)
			->get();
	}

}
