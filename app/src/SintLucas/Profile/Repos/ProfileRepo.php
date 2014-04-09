<?php namespace SintLucas\Profile\Repos;

use SintLucas\Profile\Models\Profile;

class ProfileRepo {

	/**
	 * Social media model instance.
	 *
	 * @var \SintLucas\Profile\Models\Profile
	 */
	protected $model;

	/**
	 * Create a new social media repository instance.
	 *
	 * @param \SintLucas\Profile\Models\Profile $model
	 */
	public function __construct(Profile $model)
	{
		$this->model = $model;
	}

}
