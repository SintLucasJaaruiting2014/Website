<?php namespace SintLucas\Backend;

use SintLucas\Core\Controllers\ResourceController;
use SintLucas\Domain\Profile\Repos\ProfileRepo;

class ProfileController extends ResourceController {

	protected $name = 'profile';

	public function __construct(ProfileRepo $repo)
	{
		$this->repo = $repo;
	}

}
