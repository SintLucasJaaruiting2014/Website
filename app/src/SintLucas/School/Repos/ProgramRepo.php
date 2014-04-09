<?php namespace SintLucas\School\Repos;

use SintLucas\School\Models\Program;

class ProgramRepo {

	/**
	 * Social media model instance.
	 *
	 * @var \SintLucas\School\Models\Program
	 */
	protected $model;

	/**
	 * Create a new social media repository instance.
	 *
	 * @param \SintLucas\School\Models\Program $model
	 */
	public function __construct(Program $model)
	{
		$this->model = $model;
	}

}
