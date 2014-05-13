<?php namespace SintLucas\Profile\SocialMedia;

use SintLucas\Rest\Controller;

class AccountController extends Controller {

	public function __construct(AccountRepository $repository)
	{
		$this->repository = $repository;
	}

}
