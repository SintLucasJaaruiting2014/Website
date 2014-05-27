<?php namespace SintLucas\Profile\UseCase;

use SintLucas\Profile\Profile;

class AddSocialMediaAccountRequest {

	public $account;

	public function __construct(SocialMediaAccount $account)
	{
		$this->account = $account;
	}

}
