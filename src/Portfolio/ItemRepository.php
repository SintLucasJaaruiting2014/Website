<?php namespace SintLucas\Portfolio;

use SintLucas\Core\EloquentRepository;

class ItemRepository extends EloquentRepository {

	public function __construct(Item $model)
	{
		$this->model = $model;
	}

}
