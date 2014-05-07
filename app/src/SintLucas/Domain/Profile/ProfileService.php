<?php namespace SintLucas\Domain\Profile;

use Illuminate\Support\Facades\Config;
use SintLucas\Domain\Profile\Models\Profile;
use SintLucas\Domain\Profile\Repos\AnswerRepo;
use SintLucas\Domain\Profile\Repos\FilterOptionRepo;
use SintLucas\Domain\Profile\Repos\FilterRepo;
use SintLucas\Domain\Profile\Repos\ProfileRepo;
use SintLucas\Domain\Profile\Repos\ProfilePropertyRepo;
use SintLucas\Domain\Profile\Repos\QuestionRepo;
use SintLucas\Domain\Profile\Repos\SocialMediaRepo;
use SintLucas\Domain\Profile\Repos\SocialMediaTypeRepo;

class ProfileService {

	/**
	 * AnswerRepo instance.
	 *
	 * @var \SintLucas\Domain\Profile\Repos\AnswerRepo
	 */
	protected $answerRepo;

	/**
	 * FilterOptionRepo instance.
	 *
	 * @var \SintLucas\Domain\Profile\Repos\FilterOptionRepo
	 */
	protected $filterOptionRepo;

	/**
	 * FilterRepo instance.
	 *
	 * @var \SintLucas\Domain\Profile\Repos\FilterRepo
	 */
	protected $filterRepo;

	/**
	 * ProfileRepo instance.
	 *
	 * @var \SintLucas\Domain\Profile\Repos\ProfileRepo
	 */
	protected $profileRepo;

	/**
	 * ProfilePropertyRepo instance.
	 *
	 * @var \SintLucas\Domain\Profile\Repos\ProfilePropertyRepo
	 */
	protected $profilePropertyRepo;

	/**
	 * QuestionRepo instance.
	 *
	 * @var \SintLucas\Domain\Profile\Repos\QuestionRepo
	 */
	protected $questionRepo;

	/**
	 * SocialMediaRepo instance.
	 *
	 * @var \SintLucas\Domain\Profile\Repos\SocialMediaRepo
	 */
	protected $socialMediaRepo;

	/**
	 * SocialMediaTypeRepo instance.
	 *
	 * @var \SintLucas\Domain\Profile\Repos\SocialMediaTypeRepo
	 */
	protected $socialMediaTypeRepo;

	/**
	 * Create a new profile service instance.
	 *
	 * @param \SintLucas\Domain\Profile\Repos\AnswerRepo          $answerRepo
	 * @param \SintLucas\Domain\Profile\Repos\FilterOptionRepo    $filterOptionRepo
	 * @param \SintLucas\Domain\Profile\Repos\FilterRepo          $filterRepo
	 * @param \SintLucas\Domain\Profile\Repos\ProfileRepo         $profileRepo
	 * @param \SintLucas\Domain\Profile\Repos\ProfilePropertyRepo $profileRepo
	 * @param \SintLucas\Domain\Profile\Repos\QuestionRepo        $questionRepo
	 * @param \SintLucas\Domain\Profile\Repos\SocialMediaRepo     $socialMediaRepo
	 * @param \SintLucas\Domain\Profile\Repos\SocialMediaTypeRepo $socialMediaTypeRepo
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
	 * @return \SintLucas\Domain\Profile\Models\Profile
	 */
	public function findProfileByUserId($userId)
	{
		return $this->profileRepo->findBy(array('user_id' => $userId), array('schoolLocation', 'program', 'year'));
	}

	/**
	 * Get all the filters from the filter repo.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function getFilters()
	{
		return $this->filterRepo->getBy(array(), array('options' => function($query)
		{
			return $query->orderBy('value');
		}));
	}

	/**
	 * Get the answers from a specific user.
	 *
	 * @param  \SintLucas\Domain\Profile\Models\Profile
	 * @return \Illuminate\Support\Collection
	 */
	public function getAnswersForProfile(Profile $profile)
	{
		return $this->answerRepo->getBy(array('profile_id' => $profile->id));
	}

	/**
	 * Get the properties from a specific user.
	 *
	 * @param  \SintLucas\Domain\Profile\Models\Profile
	 * @return \Illuminate\Support\Collection
	 * @todo   Move sorting to repository
	 */
	public function getPropertiesForProfile(Profile $profile)
	{
		return $this->profilePropertyRepo->getBy(array('profile_id' => $profile->id), array('filter', 'option'));
	}

	/**
	 * Get social media accounts and types for the given profile.
	 *
	 * @param  \SintLucas\Domain\Profile\Models\Profile
	 * @return \Illuminate\Support\Collection
	 */
	public function getSocialMediaAccountsForProfile(Profile $profile)
	{
		return $this->socialMediaRepo->getBy(array('profile_id' => $profile->id));
	}

	/**
	 * Get all the social media types.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function getSocialMediaTypes()
	{
		return $this->socialMediaTypeRepo->all();
	}

	/**
	 * Get all the questions for the given school type.
	 *
	 * @param  int $typeId
	 * @return \Illuminate\Support\Collection
	 */
	public function getQuestionsForType($typeId)
	{
		return $this->questionRepo->getBy(array('type_id' => $typeId));
	}

	/**
	 * Sync the answers
	 *
	 * @param  \SintLucas\Domain\Profile\Models\Profile $profile
	 * @param  array                             $data
	 * @return void
	 */
	public function syncAnswers(Profile $profile, $data = array())
	{
		$this->answerRepo->deleteBy(array(
			'profile_id' => $profile->id
		));

		$max = Config::get('profile.questions.max', 2);
		$data = $this->filterUnique($data, 'question');

		foreach(array_slice($data, 0, $max) as $item)
		{
			$this->answerRepo->create(array(
				'profile_id' => $profile->id,
				'question_id' => $item['question'],
				'value' => $item['answer'],
			));
		}
	}

	/**
	 * Sync the social media accounts
	 *
	 * @param  \SintLucas\Domain\Profile\Models\Profile $profile
	 * @param  array                             $data
	 * @return void
	 */
	public function syncSocialMedia(Profile $profile, $data = array())
	{
		$this->socialMediaRepo->deleteBy(array(
			'profile_id' => $profile->id
		));

		$max = Config::get('profile.social_media.max', 3);
		$data = $this->filterEmpty($data, 'type');
		$data = $this->filterEmpty($data, 'username');
		$data = $this->filterUnique($data, 'type');

		foreach(array_slice($data, 0, $max) as $item)
		{
			$this->socialMediaRepo->create(array(
				'profile_id' => $profile->id,
				'type_id' => $item['type'],
				'username' => $item['username'],
			));
		}
	}

	/**
	 * Sync the social media accounts
	 *
	 * @param  \SintLucas\Domain\Profile\Models\Profile $profile
	 * @param  array                             $data
	 * @return void
	 */
	public function syncProfileProperties(Profile $profile, $data = array())
	{
		$filters = $this->filterRepo->all();

		$data = $this->filterProfileProperties($filters, $data);

		$this->profilePropertyRepo->deleteBy(array(
			'profile_id' => $profile->id
		));

		foreach($data as $filter => $options)
		{
			foreach($options as $option)
			{
				$this->profilePropertyRepo->create(array(
					'profile_id' => $profile->id,
					'option_id'  => $option,
					'filter_id'  => $filter
				));
			}
		}
	}

	public function updateProfile($profile, $data = array())
	{
		return $this->profileRepo->update($profile, $data);
	}

	public function filterProfileProperties($filters, $data = array())
	{
		$results = array();
		foreach($filters as $filter)
		{
			if(isset($data[$filter->id]))
			{
				if($filter->multiple_choice)
				{
					$results[$filter->id] = $data[$filter->id];
				}
				else
				{
					$results[$filter->id] = array_slice($data[$filter->id], 0, 1);
				}
			}
		}

		return $results;
	}

	public function filterUnique($data, $field)
	{
		if(is_null($data)) return array();

		$results = array();
		foreach($data as $row)
		{
			if( ! isset($results[$row[$field]]))
			{
				$results[$row[$field]] = $row;
			}
		}

		return $results;
	}

	public function filterEmpty($data, $field)
	{
		if(is_null($data)) return array();

		$results = array();
		foreach($data as $row)
		{
			if( ! empty($row[$field]))
			{
				$results[] = $row;
			}
		}

		return $results;
	}

}
