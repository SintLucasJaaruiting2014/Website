<?php namespace SintLucas\User\Repos;

use SintLucas\User\Models\User;

class ClassRepo {

	/**
	 * Social media model instance.
	 *
	 * @var \SintLucas\User\Models\User
	 */
	protected $model;

	/**
	 * Create a new social media repository instance.
	 *
	 * @param \SintLucas\User\Models\User $model
	 */
	public function __construct(User $model)
	{
		$this->model = $model;
	}

}
