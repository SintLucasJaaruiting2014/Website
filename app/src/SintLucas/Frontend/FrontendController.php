<?php namespace SintLucas\Frontend;

use Illuminate\Routing\Controller;
use SintLucas\Domain\Profile\ProfileService;
use SintLucas\Domain\School\SchoolService;

class FrontendController extends Controller {

	/**
	 * Instance of the profile service.
	 *
	 * @var \SintLucas\Domain\Profile\ProfileService
	 */
	protected $profileService;

	/**
	 * Instance of the school service.
	 *
	 * @var \SintLucas\Domain\School\SchoolService
	 */
	protected $schoolService;

	/**
	 * Create a new profile service instance.
	 *
	 * @param \SintLucas\Domain\Profile\ProfileService $profileService
	 */
	public function __construct(ProfileService $profileService, SchoolService $schoolService)
	{
		$this->profileService = $profileService;
		$this->schoolService  = $schoolService;
	}

	/**
	 * Show the overview for the given year.
	 *
	 * @param  int $year
	 * @return \SintLucas\Frontend\Views\GridView
	 */
	public function index($year)
	{
		//
	}

	/**
	 * Show a profile.
	 *
	 * @param  int    $year
	 * @param  string $slug
	 * @return \Illuminate\Http\Response
	 */
	public function show($year, $slug)
	{
		dd(func_get_args());
	}

}
