<?php namespace SintLucas\Core;

use Illuminate\Routing\Controller;

class FrontendController extends Controller {

	/**
	 * Instance of the profile service.
	 *
	 * @var \SintLucas\Profile\ProfileService
	 */
	protected $profileService;

	/**
	 * Create a new profile service instance.
	 *
	 * @param \SintLucas\Profile\ProfileService $profileService
	 */
	public function __construct(ProfileService $profileService)
	{
		$this->profileService = $profileService;
	}

	/**
	 * Show a profile.
	 *
	 * @param  string $slug
	 * @return \Illuminate\Http\Response
	 */
	public function show($slug)
	{
		//
	}

}
