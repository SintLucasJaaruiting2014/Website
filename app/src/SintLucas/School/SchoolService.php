<?php namespace SintLucas\School;

use SintLucas\School\Repos\ClassRepo;
use SintLucas\School\Repos\LocationRepo;
use SintLucas\School\Repos\ProgramRepo;
use SintLucas\School\Repos\YearRepo;

class SchoolService {

	/**
	 * Class repository instance.
	 *
	 * @var \SintLucas\School\Repos\ClassRepo
	 */
	protected $classRepo;

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
	 * @param \SintLucas\School\Repos\ClassRepo    $classRepo
	 * @param \SintLucas\School\Repos\LocationRepo $locationRepo
	 * @param \SintLucas\School\Repos\ProgramRepo  $programRepo
	 * @param \SintLucas\School\Repos\YearRepo     $yearRepo
	 */
	public function __construct(ClassRepo $classRepo, LocationRepo $locationRepo, ProgramRepo $programRepo, YearRepo $yearRepo)
	{
		$this->classRepo    = $classRepo;
		$this->locationRepo = $locationRepo;
		$this->programRepo  = $programRepo;
		$this->yearRepo     = $yearRepo;
	}

}
