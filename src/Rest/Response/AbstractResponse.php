<?php namespace SintLucas\Rest\Response;

use Illuminate\Foundation\Application;
use League\Fractal\Manager as Fractal;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;

abstract class AbstractResponse {

	protected $app;
	protected $fractal;

	public function __construct(Application $app, Fractal $fractal)
	{
		$this->app     = $app;
		$this->fractal = $fractal;
	}

	public function itemResource($item, TransformerAbstract $transformer)
	{
		return new Item($item, $transformer);
	}

	public function collectionResource($collection, TransformerAbstract $transformer)
	{
		return new Collection($collection, $transformer);
	}

	public function paginationResource($paginator, TransformerAbstract $transformer)
	{
		$resource = $this->collectionResource($paginator->getCollection(), $transformer);
		$resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

		return $resource;
	}

}
