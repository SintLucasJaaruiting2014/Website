<?php namespace SintLucas\Backend;

use SintLucas\Core\Controllers\ResourceController;
use SintLucas\Domain\User\Repos\UserRepo;

class UserController extends BaseController {

	protected $name = 'user';

	public function __construct(UserRepo $repo)
	{
		$this->repo = $repo;
	}

}
