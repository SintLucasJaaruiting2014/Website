<?php namespace SintLucas\Core\Repos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use SintLucas\Core\Exception\ValidationException;

abstract class EloquentRepo {

	/**
	 * Validation rules.
	 *
	 * @var array
	 */
	protected $rules = array();

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
	public function all()
	{
		return $this->model->get();
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
	 * Find a record by a specific field and eagerload the given relations.
	 *
	 * @param  string $field
	 * @param  int    $id
	 * @param  array  $relations
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function findBy($field, $value, $relations = array())
	{
		return $this->model->with($relations)->where($field, '=', $value)->first();
	}

	/**
	 * Get records by a specific field and eagerload the given relations.
	 *
	 * @param  int   $id
	 * @param  array $relations
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function getBy($field, $value, $relations = array())
	{
		return $this->model->with($relations)->where($field, '=', $value)->get();
	}

	/**
	 * Create a new record.
	 *
	 * @param  array  $data
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
	 * @param  int    $id
	 * @param  array  $data
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function update($id, $data = array())
	{
		$this->validate($data);

		$model = $this->find($id);
		$model->fill($data);

		if($model->save())
		{
			return $model;
		}

		throw new SavingErrorException("There was an error updating the model.");
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
	 * Validate a record.
	 *
	 * @param  array $data
	 * @return bool|\Illuminate\Support\MessageBag
	 */
	public function validate($data)
	{
		$validation = Validator::make($data, $this->rules);

		if($validation->fails())
		{
			throw new ValidationException("There are validation errors", $validation->getMessageBag());
		}

		return true;
	}

}
