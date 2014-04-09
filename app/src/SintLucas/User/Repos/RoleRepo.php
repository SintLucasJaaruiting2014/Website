<?php namespace SintLucas\User\Repos;

use SintLucas\User\Models\Role;

class ClassRepo {

	/**
	 * Social media model instance.
	 *
	 * @var \SintLucas\User\Models\Role
	 */
	protected $model;

	/**
	 * Create a new social media repository instance.
	 *
	 * @param \SintLucas\User\Models\Role $model
	 */
	public function __construct(Role $model)
	{
		$this->model = $model;
	}

}
