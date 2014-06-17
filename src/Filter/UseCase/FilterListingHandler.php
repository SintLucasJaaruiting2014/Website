<?php namespace SintLucas\Filter\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Filter\FilterRepository;

class FilterListingHandler implements HandlerInterface {

	protected $filterRepository;
	protected $propertyRepository;

	public function __construct(FilterRepository $filterRepository)
	{
		$this->filterRepository = $filterRepository;
	}

	public function handle($command)
	{
		$filters = $this->filterRepository->all();

		return new FilterListingResponse($filters);
	}

}
