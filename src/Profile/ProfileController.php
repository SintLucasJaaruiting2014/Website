<?php namespace SintLucas\Profile;

use SintLucas\Rest\Controller;

class ProfileController extends Controller {

	public function __construct(ProfileRepository $repository)
	{
		$this->repository = $repository;
	}

}
