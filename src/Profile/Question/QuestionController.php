<?php namespace SintLucas\Profile\Question;

use SintLucas\Rest\Controller;

class QuestionController extends Controller {

	public function __construct(QuestionRepository $repository)
	{
		$this->repository = $repository;
	}

}
