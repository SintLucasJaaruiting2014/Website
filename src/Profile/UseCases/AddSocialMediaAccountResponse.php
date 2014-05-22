<?php namespace SintLucas\Profile\UseCases;

use SintLucas\Profile\Profile;

class AddSocialMediaAccountRequest {

	public $account;

	public function __construct(SocialMediaAccount $account)
	{
		$this->account = $account;
	}

}
