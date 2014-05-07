<?php namespace SintLucas\Domain\Profile\Repos;

use SintLucas\Core\Repos\EloquentRepo;

class ProfileRepo extends EloquentRepo {

	/**
	 * Validation rules.
	 *
	 * @var array
	 */
	protected $rules = array(
		'email' => 'email',
		'website' => 'url',
		'quote' => 'max:75'
	);

	/**
	 * Search columns.
	 *
	 * @var array
	 */
	protected $search = array(
		'profile_profiles.first_name',
		'profile_profiles.last_name_prefix',
		'profile_profiles.last_name',
		'user_users.email',
		'user_users.student_id'
	);

	protected function allQuery($sort, $search)
	{
		$query = parent::allQuery($sort, $search);

		$query->join('user_users', 'user_users.id', '=', 'profile_profiles.user_id');
		$query->select(array('profile_profiles.*', 'user_users.student_id', 'user_users.email as school_email'));

		return $query;
	}


}
