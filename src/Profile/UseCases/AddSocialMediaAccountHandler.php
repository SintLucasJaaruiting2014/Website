<?php namespace SintLucas\Profile\UseCases;

use SintLucas\CommandBus\HandlerInterface;

class AddSocialMediaAccountHandler implements HandlerInterface {

	public function handle($command)
	{
		return new AddSocialMediaAccountResponse();
	}

}
