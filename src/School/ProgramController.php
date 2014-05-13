<?php namespace SintLucas\School;

use SintLucas\Rest\Controller;

class ProgramController extends Controller {

	public function __construct(ProgramRepository $repository)
	{
		$this->repository = $repository;
	}

}
