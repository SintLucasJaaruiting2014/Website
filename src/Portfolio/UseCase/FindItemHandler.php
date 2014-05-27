<?php namespace SintLucas\Portfolio\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Portfolio\ItemRepository;
use SintLucas\Profile\ProfileRepository;

class FindItemHandler implements HandlerInterface {

	protected $itemRepository;
	protected $profileRepository;

	public function __construct(ItemRepository $itemRepository, ProfileRepository $profileRepository)
	{
		$this->itemRepository    = $itemRepository;
		$this->profileRepository = $profileRepository;
	}

	public function handle($command)
	{
		$profile = $this->profileRepository->find($command->profileId);
		$item = $this->itemRepository->find($command->id);

		return new FindItemResponse($item);
	}

}
