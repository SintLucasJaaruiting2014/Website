<?php namespace SintLucas\Core\Interfaces;

interface CrudRepoInterface {

	/**
	 * Get all records.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function paginate($perPage = 30, $sort = array());

	/**
	 * Get all records.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function all($sort = array());

	/**
	 * Find a record.
	 *
	 * @param  int $id
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function find($id);

	/**
	 * Find a record by the given data and eagerload the given relations.
	 *
	 * @param  array $data
	 * @param  array $relations
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function findBy($data = array(), $relations = array());

	/**
	 * Get records by the given data and eagerload the given relations.
	 *
	 * @param  array $data
	 * @param  array $relations
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function getBy($data = array(), $relations = array());

	/**
	 * Create a new record.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function create($data = array());

	/**
	 * Update a record.
	 *
	 * @param  int    $id
	 * @param  array  $data
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function update($id, $data = array());

	/**
	 * Update a record.
	 *
	 * @param  int    $whereData
	 * @param  array  $data
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function updateBy($whereData = array(), $data = array());

	/**
	 * Delete a record.
	 *
	 * @param  int $id
	 * @return bool
	 */
	public function delete($id);

	/**
	 * Delete all records that match the given data.
	 *
	 * @param  array $data
	 * @return bool
	 */
	public function deleteBy($data = array());

	/**
	 * Validate a record.
	 *
	 * @param  array $data
	 * @return bool|\Illuminate\Support\MessageBag
	 */
	public function validate($data);
}
