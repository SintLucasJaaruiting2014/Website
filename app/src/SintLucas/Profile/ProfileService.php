<?php namespace SintLucas\Profile;

use SintLucas\Profile\Repos\ProfileRepo;
use SintLucas\Profile\Repos\SocialMediaRepo;

class ProfileService {

	/**
	 * Profile repository instance.
	 *
	 * @var \SintLucas\Profile\Repos\ProfileRepo
	 */
	protected $profileRepo;

	/**
	 * Social media repository instance.
	 *
	 * @var \SintLucas\Profile\Repos\SocialMediaRepo
	 */
	protected $socialMediaRepo;

	/**
	 * Create a new profile service instance.
	 *
	 * @param \SintLucas\Profile\Repos\ProfileRepo     $profileRepo
	 * @param \SintLucas\Profile\Repos\SocialMediaRepo $socialMediaRepo
	 */
	public function __construct(ProfileRepo $profileRepo, SocialMediaRepo $socialMediaRepo)
	{
		$this->profileRepo     = $profileRepo;
		$this->socialMediaRepo = $socialMediaRepo;
	}

}
