<?php namespace SintLucas\School;

use SintLucas\School\Repos\LocationRepo;
use SintLucas\School\Repos\ProgramRepo;
use SintLucas\School\Repos\YearRepo;

class SchoolService {

	/**
	 * Location repository instance.
	 *
	 * @var \SintLucas\School\Repos\LocationRepo
	 */
	protected $locationRepo;

	/**
	 * Program repository instance.
	 *
	 * @var \SintLucas\School\Repos\ProgramRepo
	 */
	protected $programRepo;

	/**
	 * Year repository instance.
	 *
	 * @var \SintLucas\School\Repos\YearRepo
	 */
	protected $yearRepo;

	/**
	 * Create a new school service.
	 *
	 * @param \SintLucas\School\Repos\LocationRepo $locationRepo
	 * @param \SintLucas\School\Repos\ProgramRepo  $programRepo
	 * @param \SintLucas\School\Repos\YearRepo     $yearRepo
	 */
	public function __construct(LocationRepo $locationRepo, ProgramRepo $programRepo, YearRepo $yearRepo)
	{
		$this->locationRepo = $locationRepo;
		$this->programRepo  = $programRepo;
		$this->yearRepo     = $yearRepo;
	}

}
