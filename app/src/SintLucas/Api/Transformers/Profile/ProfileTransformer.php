<?php namespace SintLucas\Api\Transformers\Profile;

use League\Fractal\TransformerAbstract;
use SintLucas\Api\Transformers\Portfolio\ItemTransformer;
use SintLucas\Api\Transformers\Profile\AnswerTransformer;
use SintLucas\Api\Transformers\School\LocationTransformer;
use SintLucas\Api\Transformers\School\ProgramTransformer;
use SintLucas\Api\Transformers\Profile\PropertyTransformer;
use SintLucas\Api\Transformers\User\UserTransformer;
use SintLucas\Api\Transformers\School\YearTransformer;
use SintLucas\Domain\Profile\Models\Profile;

class ProfileTransformer extends TransformerAbstract {

	/**
	 * List of resources possible to embed via this transformer
	 *
	 * @var array
	 */
	protected $availableEmbeds = array(
		'answers',
		'portfolio_items',
		'program',
		'properties',
		'school_location',
		'social_media',
		'user',
		'year'
	);

	/**
	 * AnswerTransformer instance.
	 *
	 * @var \SintLucas\Api\Transformers\Profile\AnswerTransformer
	 */
	protected $answerTransformer;

	/**
	 * ProgramTransformer instance.
	 *
	 * @var \SintLucas\Api\Transformers\Portfolio\ItemTransformer
	 */
	protected $itemTransformer;

	/**
	 * LocationTransformer instance.
	 *
	 * @var \SintLucas\Api\Transformers\School\LocationTransformer
	 */
	protected $locationTransformer;

	/**
	 * ProgramTransformer instance.
	 *
	 * @var \SintLucas\Api\Transformers\School\ProgramTransformer
	 */
	protected $programTransformer;

	/**
	 * PropertyTransformer instance.
	 *
	 * @var \SintLucas\Api\Transformers\Profile\PropertyTransformer
	 */
	protected $propertyTransformer;

	/**
	 * SocialMediaTransformer instance.
	 *
	 * @var \SintLucas\Api\Transformers\Profile\SocialMediaTransformer
	 */
	protected $socialMediaTransformer;

	/**
	 * UserTransformer instance.
	 *
	 * @var \SintLucas\Api\Transformers\User\UserTransformer
	 */
	protected $userTransformer;

	/**
	 * YearTransformer instance.
	 *
	 * @var \SintLucas\Api\Transformers\School\YearTransformer
	 */
	protected $yearTransformer;

	public function __construct(
		AnswerTransformer $answerTransformer,
		LocationTransformer $locationTransformer,
		ItemTransformer $itemTransformer,
		ProgramTransformer $programTransformer,
		PropertyTransformer $propertyTransformer,
		SocialMediaTransformer $socialMediaTransformer,
		UserTransformer $userTransformer,
		YearTransformer $yearTransformer)
	{
		$this->answerTransformer      = $answerTransformer;
		$this->locationTransformer    = $locationTransformer;
		$this->itemTransformer        = $itemTransformer;
		$this->programTransformer     = $programTransformer;
		$this->propertyTransformer    = $propertyTransformer;
		$this->socialMediaTransformer = $socialMediaTransformer;
		$this->userTransformer        = $userTransformer;
		$this->yearTransformer        = $yearTransformer;
	}

	/**
	 * Turn this item object into a generic array
	 *
	 * @return array
	 */
	public function transform(Profile $profile)
	{
		return array(
			'id'               => (int) $profile->id,
			'email'            => $profile->email,
			'first_name'       => $profile->first_name,
			'last_name_prefix' => $profile->last_name_prefix,
			'last_name'        => $profile->last_name,
			'website'          => $profile->website,
			'location'         => $profile->location,
			'quote'            => $profile->quote,
			'approved'         => (bool) $profile->approved
		);
	}

	/**
	 * Embed Author
	 *
	 * @return League\Fractal\ItemResource
	 */
	public function embedAnswers(Profile $profile)
	{
		$answers = $profile->answers;

		return $this->collection($answers, $this->answerTransformer);
	}

	/**
	 * Embed Author
	 *
	 * @return League\Fractal\ItemResource
	 */
	public function embedPortfolioItems(Profile $profile)
	{
		$items = $profile->portfolioItems;
		$items->load('type', 'media');

		return $this->collection($items, $this->itemTransformer);
	}

	/**
	 * Embed Author
	 *
	 * @return League\Fractal\ItemResource
	 */
	public function embedProgram(Profile $profile)
	{
		$program = $profile->program;

		return $this->item($program, $this->programTransformer);
	}

	/**
	 * Embed Author
	 *
	 * @return League\Fractal\ItemResource
	 */
	public function embedProperties(Profile $profile)
	{
		$properties = $profile->properties;

		return $this->collection($properties, $this->propertyTransformer);
	}

	/**
	 * Embed Author
	 *
	 * @return League\Fractal\ItemResource
	 */
	public function embedSchoolLocation(Profile $profile)
	{
		$location = $profile->schoolLocation;

		return $this->item($location, $this->locationTransformer);
	}

	/**
	 * Embed Author
	 *
	 * @return League\Fractal\ItemResource
	 */
	public function embedSocialMedia(Profile $profile)
	{
		$socialMedia = $profile->socialMedia;

		return $this->collection($socialMedia, $this->socialMediaTransformer);
	}

	/**
	 * Embed Author
	 *
	 * @return League\Fractal\ItemResource
	 */
	public function embedUser(Profile $profile)
	{
		$user = $profile->user;

		return $this->item($user, $this->userTransformer);
	}

	/**
	 * Embed Author
	 *
	 * @return League\Fractal\ItemResource
	 */
	public function embedYear(Profile $profile)
	{
		$year = $profile->year;

		return $this->item($year, $this->yearTransformer);
	}
}
