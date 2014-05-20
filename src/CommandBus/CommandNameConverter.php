<?php namespace SintLucas\CommandBus;

use Illuminate\Foundation\Application;

class CommandNameConverter {

	public function getHandlerClass($command)
	{
		return str_replace('Request', 'Handler', get_class($command));
	}

}
