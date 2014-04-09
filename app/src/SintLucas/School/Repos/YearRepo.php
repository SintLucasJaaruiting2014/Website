<?php namespace SintLucas\School\Repos;

use SintLucas\School\Models\Year;

class YearRepo {

	/**
	 * Social media model instance.
	 *
	 * @var \SintLucas\School\Models\Year
	 */
	protected $model;

	/**
	 * Create a new social media repository instance.
	 *
	 * @param \SintLucas\School\Models\Year $model
	 */
	public function __construct(Year $model)
	{
		$this->model = $model;
	}

}
