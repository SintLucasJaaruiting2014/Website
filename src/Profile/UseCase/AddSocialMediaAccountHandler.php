<?php namespace SintLucas\Profile\UseCase;

use SintLucas\CommandBus\HandlerInterface;

class AddSocialMediaAccountHandler implements HandlerInterface {

	public function handle($command)
	{
		return new AddSocialMediaAccountResponse();
	}

}
