<?php namespace SintLucas\DataCollector;

use Illuminate\Routing\Controller;
use SintLucas\DataCollector\Views\FilterView;
use SintLucas\DataCollector\Views\ProfileView;
use SintLucas\DataCollector\Views\QuestionView;
use SintLucas\Portfolio\PortfolioService;
use SintLucas\Profile\ProfileService;
use SintLucas\School\SchoolService;

class DataCollectorController extends Controller {

	/**
	 * Profile service instance.
	 *
	 * @var \SintLucas\Profile\ProfileService
	 */
	protected $profileService;

	/**
	 * Portfolio service instance.
	 *
	 * @var \SintLucas\Portfolio\PortfolioService
	 */
	protected $portfolioService;

	/**
	 * School service instance.
	 *
	 * @var \SintLucas\School\SchoolService
	 */
	protected $schoolService;

	/**
	 * Create a new data collector controller.
	 *
	 * @param \SintLucas\Profile\ProfileService     $profileService
	 * @param \SintLucas\Portfolio\PortfolioService $portfolioService
	 */
	public function __construct(ProfileService $profileService, PortfolioService $portfolioService, SchoolService $schoolService)
	{
		$this->profileService   = $profileService;
		$this->portfolioService = $portfolioService;
		$this->schoolService    = $schoolService;

		$this->user = new \Illuminate\Support\Fluent(array(
			'id'             => 1,
			'school_email'   => 'i.heimans@sintlucasedu.nl',
			'personal_email' => null,
			'password'       => null,
			'reset_hash'     => null,
			'created_at'     => '2014-04-09 20:26:24',
			'updated_at'     => '2014-04-09 20:26:24'
		));
	}

	/**
	 * Show the data collector overview.
	 *
	 * @return \SintLucas\DataCollector\Views\ProfileView
	 */
	public function index()
	{
		if($profile = $this->profileService->findProfileByUserId($this->user->id))
		{
			$answers             = $this->profileService->getAnswersForProfile($profile);
			$portfolioItems      = $this->portfolioService->getItemsByProfileId($profile->id);
			$program             = $this->schoolService->findProgramById($profile->program_id);
			$properties          = $this->profileService->getPropertiesForProfile($profile);
			$socialMediaAccounts = $this->profileService->getSocialMediaWithTypesForProfile($profile);
			$user                = $this->user;

			return new ProfileView(compact(
				'answers',
				'portfolioItems',
				'profile',
				'program',
				'properties',
				'socialMediaAccounts',
				'user'
			));
		}
	}

	/**
	 * Show the questions view.
	 *
	 * @return \SintLucas\DataCollector\Views\QuestionView
	 */
	public function showQuestions()
	{
		return new QuestionView();
	}

	/**
	 * Handle the questions form.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function handleQuestions()
	{
		//
	}

	/**
	 * Show the filer view.
	 *
	 * @return \SintLucas\DataCollector\Views\FilterView
	 */
	public function showFilters()
	{
		return new FilterView();
	}

	/**
	 * Handle the filters form.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function handleFilters()
	{
		//
	}

}
