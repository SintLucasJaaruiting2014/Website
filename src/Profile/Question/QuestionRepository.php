<?php namespace SintLucas\Profile\Question;

use SintLucas\Core\EloquentRepository;

class QuestionRepository extends EloquentRepository {

	public function __construct(Question $model)
	{
		$this->model = $model;
	}

}
