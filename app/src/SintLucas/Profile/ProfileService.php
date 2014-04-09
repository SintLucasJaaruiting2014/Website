<?php namespace SintLucas\Profile;

use SintLucas\Profile\Models\Profile;
use SintLucas\Profile\Repos\AnswerRepo;
use SintLucas\Profile\Repos\FilterOptionRepo;
use SintLucas\Profile\Repos\FilterRepo;
use SintLucas\Profile\Repos\ProfileRepo;
use SintLucas\Profile\Repos\ProfilePropertyRepo;
use SintLucas\Profile\Repos\QuestionRepo;
use SintLucas\Profile\Repos\SocialMediaRepo;
use SintLucas\Profile\Repos\SocialMediaTypeRepo;

class ProfileService {

	/**
	 * AnswerRepo instance.
	 *
	 * @var \SintLucas\Profile\Repos\AnswerRepo
	 */
	protected $answerRepo;

	/**
	 * FilterOptionRepo instance.
	 *
	 * @var \SintLucas\Profile\Repos\FilterOptionRepo
	 */
	protected $filterOptionRepo;

	/**
	 * FilterRepo instance.
	 *
	 * @var \SintLucas\Profile\Repos\FilterRepo
	 */
	protected $filterRepo;

	/**
	 * ProfileRepo instance.
	 *
	 * @var \SintLucas\Profile\Repos\ProfileRepo
	 */
	protected $profileRepo;

	/**
	 * ProfilePropertyRepo instance.
	 *
	 * @var \SintLucas\Profile\Repos\ProfilePropertyRepo
	 */
	protected $profilePropertyRepo;

	/**
	 * QuestionRepo instance.
	 *
	 * @var \SintLucas\Profile\Repos\QuestionRepo
	 */
	protected $questionRepo;

	/**
	 * SocialMediaRepo instance.
	 *
	 * @var \SintLucas\Profile\Repos\SocialMediaRepo
	 */
	protected $socialMediaRepo;

	/**
	 * SocialMediaTypeRepo instance.
	 *
	 * @var \SintLucas\Profile\Repos\SocialMediaTypeRepo
	 */
	protected $socialMediaTypeRepo;


	/**
	 * Create a new profile service instance.
	 *
	 * @param \SintLucas\Profile\Repos\AnswerRepo          $answerRepo
	 * @param \SintLucas\Profile\Repos\FilterOptionRepo    $filterOptionRepo
	 * @param \SintLucas\Profile\Repos\FilterRepo          $filterRepo
	 * @param \SintLucas\Profile\Repos\ProfileRepo         $profileRepo
	 * @param \SintLucas\Profile\Repos\ProfilePropertyRepo $profileRepo
	 * @param \SintLucas\Profile\Repos\QuestionRepo        $questionRepo
	 * @param \SintLucas\Profile\Repos\SocialMediaRepo     $socialMediaRepo
	 * @param \SintLucas\Profile\Repos\SocialMediaTypeRepo $socialMediaTypeRepo
	 */
	public function __construct(
		AnswerRepo $answerRepo,
		FilterOptionRepo $filterOptionRepo,
		FilterRepo $filterRepo,
		ProfileRepo $profileRepo,
		ProfilePropertyRepo $profilePropertyRepo,
		QuestionRepo $questionRepo,
		SocialMediaRepo $socialMediaRepo,
		SocialMediaTypeRepo $socialMediaTypeRepo)
	{
		$this->answerRepo          = $answerRepo;
		$this->filterOptionRepo    = $filterOptionRepo;
		$this->filterRepo          = $filterRepo;
		$this->profileRepo         = $profileRepo;
		$this->profilePropertyRepo = $profilePropertyRepo;
		$this->questionRepo        = $questionRepo;
		$this->socialMediaRepo     = $socialMediaRepo;
		$this->socialMediaTypeRepo = $socialMediaTypeRepo;
	}

	/**
	 * Find a profile by user id.
	 *
	 * @param  int $userId
	 * @return \SintLucas\Profile\Models\Profile
	 */
	public function findProfileByUserId($userId)
	{
		return $this->profileRepo->findBy(array('user_id' => $userId), array('location', 'program', 'year'));
	}

	/**
	 * Get all the filters from the filter repo.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function getFilters()
	{
		return $this->filterRepo->all();
	}

	/**
	 * Get the answers from a specific user.
	 *
	 * @param  int $userId
	 * @return \Illuminate\Support\Collection
	 */
	public function getAnswersForProfile(Profile $profile)
	{
		return $this->answerRepo->getBy(array('profile_id' => $profile->id));
	}

	/**
	 * Get the properties from a specific user.
	 *
	 * @param  int $userId
	 * @return \Illuminate\Support\Collection
	 */
	public function getPropertiesForProfile(Profile $profile)
	{
		return $this->profilePropertyRepo->getBy(array('profile_id' => $profile->id), array('filters'));
	}

	/**
	 * Get social media accounts and types for the given profile.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function getSocialMediaWithTypesForProfile(Profile $profile)
	{
		return $this->socialMediaRepo->getBy(array('profile_id' => $profile->id), array('type'));
	}

}
