<?php namespace SintLucas\Domain\School;

use SintLucas\Domain\School\Repos\LocationRepo;
use SintLucas\Domain\School\Repos\ProgramRepo;
use SintLucas\Domain\School\Repos\TypeRepo;
use SintLucas\Domain\School\Repos\YearRepo;

class SchoolService {

	/**
	 * Location repository instance.
	 *
	 * @var \SintLucas\Domain\School\Repos\LocationRepo
	 */
	protected $locationRepo;

	/**
	 * Program repository instance.
	 *
	 * @var \SintLucas\Domain\School\Repos\ProgramRepo
	 */
	protected $programRepo;

	/**
	 * Type repository instance.
	 *
	 * @var \SintLucas\Domain\School\Repos\TypeRepo
	 */
	protected $typeRepo;

	/**
	 * Year repository instance.
	 *
	 * @var \SintLucas\Domain\School\Repos\YearRepo
	 */
	protected $yearRepo;

	/**
	 * Create a new school service.
	 *
	 * @param \SintLucas\Domain\School\Repos\LocationRepo $locationRepo
	 * @param \SintLucas\Domain\School\Repos\ProgramRepo  $programRepo
	 * @param \SintLucas\Domain\School\Repos\TypeRepo     $typeRepo
	 * @param \SintLucas\Domain\School\Repos\YearRepo     $yearRepo
	 */
	public function __construct(LocationRepo $locationRepo, ProgramRepo $programRepo, TypeRepo $typeRepo, YearRepo $yearRepo)
	{
		$this->locationRepo = $locationRepo;
		$this->programRepo  = $programRepo;
		$this->typeRepo     = $typeRepo;
		$this->yearRepo     = $yearRepo;
	}

	/**
	 * Find a location by id.
	 *
	 * @param  int $id
	 * @return \SintLucas\Domain\School\Models\Location
	 */
	public function findLocationById($id)
	{
		return $this->locationRepo->find($id);
	}

	/**
	 * Find a program by id.
	 *
	 * @param  int $id
	 * @return \SintLucas\Domain\School\Models\Program
	 */
	public function findProgramById($id)
	{
		return $this->programRepo->find($id);
	}

	/**
	 * Find a year by id.
	 *
	 * @param  int $id
	 * @return \SintLucas\Domain\School\Models\Year
	 */
	public function findYearById($id)
	{
		return $this->yearRepo->find($id);
	}

}
