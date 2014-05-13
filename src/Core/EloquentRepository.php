<?php namespace SintLucas\Core;

use InvalidArgumentException;

abstract class EloquentRepository {

	protected $map;
	protected $model;

	public function __construct($model = null)
	{
		$this->model = $model;
	}

	public function all()
	{
		return $this->model->all();
	}

	public function allPaginated($perPage = 30)
	{
		$paginator = $this->model->paginate($perPage);

		return new Paginator(
			$paginator->getItems(),
			$paginator->getCurrentPage(),
			$paginator->getPerPage(),
			ceil($paginator->getTotal() / $paginator->getPerPage())
		);
	}

	public function find($id)
	{
		return $this->model->find($id);
	}

	public function findRelated(Model $model, $id)
	{
		$field = $this->getRelationName($model);

		return $this->model->query()
			->where($field, $model->id)
			->find($id);
	}

	public function getRelated(Model $model)
	{
		$field = $this->getRelationName($model);

		return $this->model->query()->where($field, $model->id)->get();
	}

	protected function getRelationName(Model $model)
	{
		$class = class_basename($model);
		return strtolower(sprintf('%s_id', $class));
	}

	public function save()
	{
		//
	}

}
