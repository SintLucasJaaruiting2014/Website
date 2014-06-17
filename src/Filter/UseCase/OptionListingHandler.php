<?php namespace SintLucas\Filter\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Filter\FilterRepository;
use SintLucas\Filter\OptionRepository;

class OptionListingHandler implements HandlerInterface {

	protected $filterRepository;
	protected $propertyRepository;

	public function __construct(FilterRepository $filterRepository, OptionRepository $optionRepository)
	{
		$this->filterRepository = $filterRepository;
		$this->optionRepository = $optionRepository;
	}

	public function handle($command)
	{
		$filter = $this->filterRepository->find($command->filterId);
		$options = $this->optionRepository->getBy($filter);

		return new OptionListingResponse($options);
	}

}
