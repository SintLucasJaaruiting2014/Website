<?php namespace SintLucas\Profile\Question;

use SintLucas\Profile\ProfileRepository;
use SintLucas\Rest\NestedController;

class AnswerController extends NestedController {

	public function __construct(ProfileRepository $related, AnswerRepository $repository)
	{
		$this->related    = $related;
		$this->repository = $repository;
	}

}
