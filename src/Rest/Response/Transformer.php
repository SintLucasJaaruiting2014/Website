<?php namespace SintLucas\Rest\Response;

use Illuminate\Foundation\Application;
use League\Fractal\Manager as Fractal;
use League\Fractal\Resource;

class Transformer {

	private $container;
	private $fractal;

	public function __construct(Application $container, Fractal $fractal)
	{
		$this->container = $container;
		$this->fractal   = $fractal;
	}

	public function transform($obj)
	{
		$resource = $this->prepareResource($obj);

		return $this->fractal->createData($resource);
	}

	public function prepareResource($obj)
	{
		$response = $this->getResponse($obj);

		return $response->prepare($obj);
	}

	public function getResponse($obj)
	{
		$class = $this->getResponseClass($obj);

		return $this->container->make($class);
	}

	protected function getResponseClass($obj)
	{
		return str_replace('UseCase', 'Response', get_class($obj));
	}
}
