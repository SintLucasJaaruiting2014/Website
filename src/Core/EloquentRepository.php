<?php namespace SintLucas\Core;

abstract class EloquentRepository {

	protected $model;

	public function __construct($model = null)
	{
		$this->model = $model;
	}

	public function all()
	{
		return $this->model->all();
	}

	public function allPaginated($perPage)
	{
		return $this->model->paginate($perPage);
	}

	public function find($id)
	{
		return $this->model->find($id);
	}

	public function save()
	{
		//
	}

}
