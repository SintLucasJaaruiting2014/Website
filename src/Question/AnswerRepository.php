<?php namespace SintLucas\Question;

use SintLucas\Core\EloquentRepository;
use SintLucas\Profile\Profile;

class AnswerRepository extends EloquentRepository {

	public function __construct(Answer $model)
	{
		$this->model = $model;
	}

	public function findBy(Profile $profile, $id)
	{
		$query = $this->model->with(array('question'));

		return $query->where('profile_id', $profile->id)->find($id);
	}

	public function getBy(Profile $profile)
	{
		$query = $this->model->with(array('question'));

		return $query->where('profile_id', $profile->id)->get();
	}
}
