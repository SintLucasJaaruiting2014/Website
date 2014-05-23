<?php namespace SintLucas\Core;

use InvalidArgumentException;

abstract class EloquentRepository {

	protected $model;

	public function __construct($model = null)
	{
		$this->model = $model;
	}

	public function find($id)
	{
		return $this->model->find($id);
	}

	public function save(Model $model)
	{
		return $model->save();
	}

}
