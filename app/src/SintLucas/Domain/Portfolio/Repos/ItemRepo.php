<?php namespace SintLucas\Domain\Portfolio\Repos;

use SintLucas\Core\Repos\EloquentRepo;

class ItemRepo extends EloquentRepo {

	/**
	 * Validation rules.
	 *
	 * @var array
	 */
	protected $rules = array(
		'image' => 'image'
	);

}
