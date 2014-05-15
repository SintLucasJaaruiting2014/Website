<?php namespace SintLucas\Core\Repos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use SintLucas\Core\Interfaces\CrudRepoInterface;
use SintLucas\Core\Exception\ValidationException;

abstract class EloquentRepo implements CrudRepoInterface {

	/**
	 * Validation rules.
	 *
	 * @var array
	 */
	protected $rules = array();

	/**
	 * Search columns.
	 *
	 * @var array
	 */
	protected $search = array();

	/**
	 * Create a new eloquent repository instance.
	 *
	 * @param \Illuminate\Database\Eloquent\Model $model
	 */
	public function __construct(Model $model)
	{
		$this->model = $model;
	}

	/**
	 * Get all records.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function paginate($perPage = 30, $sort = array(), $search = null)
	{
		$query = $this->allQuery($sort, $search);

		return $query->paginate($perPage);
	}

	protected function allQuery($sort, $search)
	{
		$query = $this->model->newQuery();

		$this->applySort($query, $sort);
		$this->applySearch($query, $search);

		return $query;
	}

	/**
	 * Get all records.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function all($sort = array(), $search = null)
	{
		$query = $this->allQuery($sort, $search);

		return $query->get();
	}

	/**
	 * Find a record.
	 *
	 * @param  int $id
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function find($id)
	{
		return $this->model->findOrFail($id);
	}

	/**
	 * Find a record by the given data and eagerload the given relations.
	 *
	 * @param  array $data
	 * @param  array $relations
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function findBy($data = array(), $relations = array())
	{
		$query = $this->model->with($relations);

		$this->applyWheres($query, $data);

		return $query->first();
	}

	/**
	 * Get records by the given data and eagerload the given relations.
	 *
	 * @param  array $data
	 * @param  array $relations
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function getBy($data = array(), $relations = array())
	{
		$query = $this->model->with($relations);

		$this->applyWheres($query, $data);

		return $query->get();
	}

	/**
	 * Create a new record.
	 *
	 * @param  array $data
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function create($data = array())
	{
		$this->validate($data);

		$model = $this->model->newInstance($data);

		if($model->save())
		{
			return $model;
		}

		throw new SavingErrorException("There was an error saving the model.");
	}

	/**
	 * Update a record.
	 *
	 * @param  \Illuminate\Database\Eloquent\Model $model
	 * @param  array  $data
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function update($model, $data = array())
	{
		$model->fill($data);

		$this->validate($model->getAttributes());

		if($model->save())
		{
			return $model;
		}

		throw new SavingErrorException("There was an error updating the model.");
	}

	/**
	 * Update records which match the where data.
	 *
	 * @param  int    $whereData
	 * @param  array  $data
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function updateBy($whereData = array(), $data = array())
	{
		$query = $this->model->newQuery();
		foreach($whereData as $key => $value)
		{
			$query->where($key, '=', $value);
		}

		return $query->update($data);
	}

	/**
	 * Delete a record.
	 *
	 * @param  int $id
	 * @return bool
	 */
	public function delete($id)
	{
		$model = $this->find($id);

		return $model->delete();
	}

	/**
	 * Delete all records that match the given data.
	 *
	 * @param  array $data
	 * @return bool
	 */
	public function deleteBy($data = array())
	{
		$query = $this->model->newQuery();

		foreach($data as $key => $value)
		{
			$query->where($key, $value);
		}

		return $query->delete();
	}

	public function getRules($data)
	{
		return $this->rules;
	}

	/**
	 * Validate a record.
	 *
	 * @param  array $data
	 * @return bool|\Illuminate\Support\MessageBag
	 */
	public function validate($data)
	{
		$validation = Validator::make($data, $this->getRules($data));

		if($validation->fails())
		{
			throw new ValidationException("There are validation errors", $validation->getMessageBag());
		}

		return true;
	}

	/**
	 * Apply wheres from an associative array.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder $query
	 * @param  array                                 $data
	 * @return void
	 */
	protected function applyWheres($query, $data)
	{
		foreach($data as $key => $value)
		{
			$query->where($key, '=', $value);
		}
	}

	/**
	 * Apply sort columns.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder $query
	 * @param  array                                 $sort
	 * @return void
	 */
	protected function applySort($query, $sort)
	{
		foreach($sort as $column => $directtion)
		{
			$query->orderBy($column, $directtion);
		}
	}

	/**
	 * Apply sort columns.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder $query
	 * @param  string                                $search
	 * @return void
	 */
	protected function applySearch($query, $search)
	{
		$search = trim($search);
		if( ! empty($search))
		{
			foreach($this->search as $column)
			{
				$query->orWhere($column, 'like', "%$search%");
			}
		}
	}

}
