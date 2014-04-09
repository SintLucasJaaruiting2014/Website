<?php namespace SintLucas\School\Repos;

use SintLucas\School\Models\Klass;

class ClassRepo {

	/**
	 * Social media model instance.
	 *
	 * @var \SintLucas\School\Models\Klass
	 */
	protected $model;

	/**
	 * Create a new social media repository instance.
	 *
	 * @param \SintLucas\School\Models\Klass $model
	 */
	public function __construct(Klass $model)
	{
		$this->model = $model;
	}

}
