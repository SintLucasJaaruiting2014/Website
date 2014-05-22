<?php namespace SintLucas\Question;

use SintLucas\Core\EloquentRepository;

class AnswerRepository extends EloquentRepository {

	public function __construct(Answer $model)
	{
		$this->model = $model;
	}

}
