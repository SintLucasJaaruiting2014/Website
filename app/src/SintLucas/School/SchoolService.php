<?php namespace SintLucas\School;

use SintLucas\School\Repos\LocationRepo;
use SintLucas\School\Repos\ProgramRepo;
use SintLucas\School\Repos\TypeRepo;
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
	 * Type repository instance.
	 *
	 * @var \SintLucas\School\Repos\TypeRepo
	 */
	protected $typeRepo;

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
	 * @param \SintLucas\School\Repos\TypeRepo     $typeRepo
	 * @param \SintLucas\School\Repos\YearRepo     $yearRepo
	 */
	public function __construct(LocationRepo $locationRepo, ProgramRepo $programRepo, TypeRepo $typeRepo, YearRepo $yearRepo)
	{
		$this->locationRepo = $locationRepo;
		$this->programRepo  = $programRepo;
		$this->typeRepo     = $typeRepo;
		$this->yearRepo     = $yearRepo;
	}

	/**
	 * Find a program by id.
	 *
	 * @param  int $id
	 * @return \SintLucas\School\Models\Program
	 */
	public function findProgramById($id)
	{
		return $this->programRepo->findBy(array('id' => $id), array('location', 'type', 'year'));
	}

}
