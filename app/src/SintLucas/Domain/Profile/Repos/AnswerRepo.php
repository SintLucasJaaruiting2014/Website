<?php namespace SintLucas\Domain\Profile\Repos;

use SintLucas\Core\Repos\EloquentRepo;

class AnswerRepo extends EloquentRepo {

	/**
	 * Validation rules.
	 *
	 * @var array
	 */
	protected $rules = array(
		'value' => 'max:450'
	);

}
