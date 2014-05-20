<?php namespace SintLucas\CommandBus;

use Illuminate\Foundation\Application;

class CommandBus {

	protected $app;
	protected $converter;

	public function __construct(Application $app, CommandNameConverter $converter)
	{
		$this->app       = $app;
		$this->converter = $converter;
	}

	public function execute($command)
	{
		$handler = $this->getHandler($command);

		return $handler->handle($command);
	}

	public function getHandler($command)
	{
		$class = $this->converter->getHandlerClass($command);

		return $this->app->make($class);
	}

}
