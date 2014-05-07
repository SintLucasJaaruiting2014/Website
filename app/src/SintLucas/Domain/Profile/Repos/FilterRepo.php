<?php namespace SintLucas\Domain\Profile\Repos;

use SintLucas\Core\Repos\EloquentRepo;

class FilterRepo extends EloquentRepo {

	/**
	 * Validation rules.
	 *
	 * @var array
	 */
	protected $rules = array(
		'label' => 'required'
	);

}
