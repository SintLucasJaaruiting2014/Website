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
		'quote' => 'max:%d'
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

	public function getRules($data)
	{
		$rules = $this->rules;
		if($data['program_id'] == 27)
		{
			$max = 175;
		}
		else
		{
			$max = 75;
		}

		$rules['quote'] = sprintf($rules['quote'], $max);

		return $rules;
	}

	protected function allQuery($sort, $search)
	{
		$query = parent::allQuery($sort, $search);

		$query->join('user_users', 'user_users.id', '=', 'profile_profiles.user_id');
		$query->select(array('profile_profiles.*', 'user_users.student_id', 'user_users.email as school_email'));

		return $query;
	}


}
