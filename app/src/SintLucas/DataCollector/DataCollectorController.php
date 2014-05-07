<?php namespace SintLucas\DataCollector;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SintLucas\DataCollector\Views\FilterView;
use SintLucas\DataCollector\Views\IndexView;
use SintLucas\DataCollector\Views\PortfolioCreateView;
use SintLucas\DataCollector\Views\ProfileView;
use SintLucas\DataCollector\Views\QuestionView;
use SintLucas\Domain\Media\MediaService;
use SintLucas\Domain\Portfolio\PortfolioService;
use SintLucas\Domain\Profile\ProfileService;
use SintLucas\Domain\School\SchoolService;

class DataCollectorController extends Controller {

	/**
	 * Profile service instance.
	 *
	 * @var \SintLucas\Domain\Profile\ProfileService
	 */
	protected $profileService;

	/**
	 * Portfolio service instance.
	 *
	 * @var \SintLucas\Domain\Portfolio\PortfolioService
	 */
	protected $portfolioService;

	/**
	 * School service instance.
	 *
	 * @var \SintLucas\Domain\School\SchoolService
	 */
	protected $schoolService;

	/**
	 * Create a new data collector controller.
	 *
	 * @param \SintLucas\Domain\Media\MediaService         $mediaService
	 * @param \SintLucas\Domain\Portfolio\PortfolioService $portfolioService
	 * @param \SintLucas\Domain\Profile\ProfileService     $profileService
	 * @param \SintLucas\Domain\School\SchoolService       $schoolService
	 * @param \SintLucas\Domain\User\Models\User           $user
	 */
	public function __construct(MediaService $mediaService, PortfolioService $portfolioService, ProfileService $profileService, SchoolService $schoolService, $user)
	{
		$this->mediaService     = $mediaService;
		$this->portfolioService = $portfolioService;
		$this->profileService   = $profileService;
		$this->schoolService    = $schoolService;

		$this->profile = $this->profileService->findProfileByUserId($user->id);
		$this->user = $user;
	}

	/**
	 * Show the data collector overview.
	 *
	 * @return \SintLucas\DataCollector\Views\IndexView
	 */
	public function index()
	{
		$data = array(
			'answers'             => $this->profileService->getAnswersForProfile($this->profile),
			'filters'             => $this->profileService->getFilters(),
			'location'            => $this->schoolService->findLocationById($this->profile->location_id),
			'portfolioItems'      => $this->portfolioService->getItemsByProfile($this->profile),
			'portfolioTypes'      => $this->portfolioService->getPortfolioTypes(),
			'profile'             => $this->profile,
			'program'             => $this->schoolService->findProgramById($this->profile->program_id),
			'properties'          => $this->profileService->getPropertiesForProfile($this->profile),
			'socialMediaAccounts' => $this->profileService->getSocialMediaAccountsForProfile($this->profile),
			'user'                => $this->user,
			'year'                => $this->schoolService->findYearById($this->profile->year_id)
		);

		return new IndexView($data);
	}

	/**
	 * Show the questions view.
	 *
	 * @return \SintLucas\DataCollector\Views\QuestionView
	 */
	public function showQuestions()
	{
		$program = $this->schoolService->findProgramById($this->profile->program_id);
		$data = array(
			'answers'     => $this->profileService->getAnswersForProfile($this->profile)->toArray(),
			'profile'     => $this->profile,
			'program'     => $program,
			'questionMax' => Config::get('profile.questions.max'),
			'questions'   => $this->profileService->getQuestionsForType($program->type_id)->lists('label', 'id')
		);

		return new QuestionView($data);
	}

	/**
	 * Handle the questions form.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function handleQuestions()
	{
		$data = Input::get('question');

		$profile = $this->profileService->findProfileByUserId($this->user->id);

		$this->profileService->syncAnswers($profile, $data);

		return Redirect::action('datacollector.controller@index');
	}

	/**
	 * Show the filter view.
	 *
	 * @return \SintLucas\DataCollector\Views\FilterView
	 */
	public function showFilters()
	{
		$data = array(
			'filters' => $this->profileService->getFilters(),
			'properties' => $this->profileService->getPropertiesForProfile($this->profile)->lists('option_id')
		);

		return new FilterView($data);
	}

	/**
	 * Handle the filters form.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function handleFilters()
	{
		$profile = $this->profileService->findProfileByUserId($this->user->id);

		$data = Input::get('filteroption');
		foreach($data as &$value)
		{
			$value = (array) $value;
		}

		$this->profileService->syncProfileProperties($profile, $data);

		return Redirect::action('datacollector.controller@index');
	}

	/**
	 * Show the profile view.
	 *
	 * @return \SintLucas\DataCollector\Views\ProfileView
	 */
	public function showProfile()
	{
		$data = array(
			'profile' => $this->profile,
			'socialMediaAccounts' => $this->profileService->getSocialMediaAccountsForProfile($this->profile)->toArray(),
			'socialMediaMax' => Config::get('profile.social_media.max'),
			'socialMediaTypes' => $this->profileService->getSocialMediaTypes()
		);

		return new ProfileView($data);
	}

	/**
	 * Handle the profiles form.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function handleProfile()
	{
		$profile = $this->profileService->findProfileByUserId($this->user->id);

		$profileData = Input::only(array('email', 'location', 'website', 'quote'));
		$socialMediaData = Input::get('social_media');

		$this->profileService->updateProfile($profile, $profileData);
		$this->profileService->syncSocialMedia($profile, $socialMediaData);

		return Redirect::action('datacollector.controller@index');
	}

	public function showCreatePortfolioItem()
	{
		$types = $this->portfolioService->getPortfolioTypes();

		$data = array(
			'type'            => 'create',
			'action'          => 'datacollector.controller@createPortfolioItem',
			'types'           => $types,
			'portfolioConfig' => $this->formatPortfolioConfig($types),
			'item'            => array()
		);

		return new PortfolioCreateView($data);
	}

	/**
	 * Format the config array with the types.
	 *
	 * @param  [type] $types [description]
	 * @return array
	 */
	protected function formatPortfolioConfig($types)
	{
		$base = Config::get('portfolio.types', array());

		$config = array();
		foreach($types as $type)
		{
			if($item = array_get($base, $type->slug.'.types'))
			{
				foreach($item as $key => $value)
				{
					$config[$type->id][] = $key;
				}
			}
		}

		return $config;
	}

	public function createPortfolioItem()
	{
		$data = array(
			'media' => array(
				'type' => Input::Get('media.type'),
				'image' => Input::file('media.image'),
				'video' => Input::get('media.video')
			),
			'type' => Input::get('portfolio.type')
		);

		$this->portfolioService->createPortfolioItemForProfile($this->profile, $data);

		return Redirect::action('datacollector.controller@index');
	}

	public function deletePortfolioItem($id)
	{
		$item = $this->portfolioService->findItemByProfileAndId($this->profile, $id);
		$this->portfolioService->deletePortfolioItem($item);

		return Redirect::action('datacollector.controller@index');
	}

}
