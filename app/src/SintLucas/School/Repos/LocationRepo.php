<?php namespace SintLucas\School\Repos;

use SintLucas\School\Models\Location;

class LocationRepo {

	/**
	 * Social media model instance.
	 *
	 * @var \SintLucas\School\Models\Location
	 */
	protected $model;

	/**
	 * Create a new social media repository instance.
	 *
	 * @param \SintLucas\School\Models\Location $model
	 */
	public function __construct(Location $model)
	{
		$this->model = $model;
	}

}
