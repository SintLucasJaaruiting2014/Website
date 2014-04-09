<?php namespace SintLucas\DataCollector;

use Illuminate\Routing\Controller;
use SintLucas\DataCollector\Views\FilterView;
use SintLucas\DataCollector\Views\ProfileView;
use SintLucas\DataCollector\Views\QuestionView;
use SintLucas\Portfolio\PortfolioService;
use SintLucas\Profile\ProfileService;

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
	 * Create a new data collector controller.
	 *
	 * @param \SintLucas\Profile\ProfileService     $profileService
	 * @param \SintLucas\Portfolio\PortfolioService $portfolioService
	 */
	public function __construct(ProfileService $profileService, PortfolioService $portfolioService)
	{
		$this->profileService = $profileService;
		$this->portfolioService = $portfolioService;
		$this->user = new \Illuminate\Support\Fluent(array('id' => 1));
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
			$answers        = $this->profileService->getAnswersForProfile($profile);
			$portfolioItems = $this->portfolioService->getItemsByProfileId($profile->id);
			$properties     = $this->profileService->getPropertiesForProfile($profile);

			return new ProfileView(compact(
				'answers',
				'portfolioItems',
				'profile',
				'properties'
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
