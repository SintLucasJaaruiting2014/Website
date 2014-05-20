<?php namespace SintLucas\Profile;

use SintLucas\Rest\Controller;

class ProfileController extends Controller {

	protected $perPage = 120;

	public function __construct(ProfileRepository $repository)
	{
		$this->repository = $repository;
	}

}
