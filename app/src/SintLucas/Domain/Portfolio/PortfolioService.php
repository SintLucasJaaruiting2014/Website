<?php namespace SintLucas\Domain\Portfolio;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use SintLucas\Core\Exception\ValidationException;
use SintLucas\Domain\Media\MediaService;
use SintLucas\Domain\Portfolio\Models\Item;
use SintLucas\Domain\Portfolio\Repos\ItemRepo;
use SintLucas\Domain\Portfolio\Repos\TypeRepo;
use SintLucas\Domain\Profile\Models\Profile;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PortfolioService {

	/**
	 * ItemRepo instance.
	 *
	 * @var \SintLucas\Domain\Profile\Repos\ItemRepo
	 */
	protected $itemRepo;

	/**
	 * ItemRepo instance.
	 *
	 * @var \SintLucas\Domain\Profile\Repos\ItemRepo
	 */
	protected $typeRepo;

	/**
	 * Media service instance.
	 *
	 * @var \SintLucas\Domain\Media\MediaService
	 */
	protected $mediaService;

	/**
	 * Create a new profile service instance.
	 *
	 * @param \SintLucas\Domain\Portfolio\Repos\ItemRepo $itemRepo
	 * @param \SintLucas\Domain\Portfolio\Repos\TypeRepo $typeRepo
	 */
	public function __construct(ItemRepo $itemRepo, TypeRepo $typeRepo, MediaService $mediaService)
	{
		$this->itemRepo     = $itemRepo;
		$this->typeRepo     = $typeRepo;
		$this->mediaService = $mediaService;
	}

	/**
	 * Get portfolio items by profile id.
	 *
	 * @param  int $profileId
	 * @return \Illuminate\Support\Collection
	 */
	public function findItemByProfileAndId(Profile $profile, $id)
	{
		return $this->itemRepo->findBy(array('profile_id' => $profile->id, 'id' => $id));
	}

	/**
	 * Get portfolio items by profile id.
	 *
	 * @param  int $profileId
	 * @return \Illuminate\Support\Collection
	 */
	public function getItemsByProfile(Profile $profile)
	{
		return $this->itemRepo->getBy(array('profile_id' => $profile->id));
	}

	/**
	 * Get portfolio items by profile id.
	 *
	 * @param  int $profileId
	 * @return \Illuminate\Support\Collection
	 */
	public function getItemsByProfileId($profileId)
	{
		return $this->itemRepo->getBy(array('profile_id' => $profileId));
	}

	public function findPortfolioType($id)
	{
		try {
			return $this->typeRepo->find($id);
		} catch (\Exception $e) {
			throw new ValidationException("Je dient alle velden in te vullen.");
		}
	}

	public function getPortfolioTypes()
	{
		return $this->typeRepo->all();
	}

	/**
	 * Create portfolio items for the given profile
	 * @param  [type] $profile [description]
	 * @param  array  $data    [description]
	 * @return [type]          [description]
	 */
	public function createPortfolioItemForProfile(Profile $profile, $data = array())
	{
		$this->validateInput($profile, $data);

		try {
			DB::beginTransaction();
			$model = $this->itemRepo->create(array(
				'profile_id' => $profile->id,
				'type_id' => array_get($data, 'type')
			));

			$media = $this->mediaService->createItemForModel($model, array_get($data, 'media'));

			DB::commit();

			$model->setRelation('media', $media);

			return $model;
		} catch (\Exception $e) {
			DB::rollback();
			throw new ValidationException("Er is iets misgegaan tijdens het uploaden, probeert het opnieuw.");
		}

	}

	protected function validateCounts(Profile $profile, $type, $data = array())
	{
		$items = $this->itemRepo->getBy(array(
			'type_id'    => array_get($data, 'type', 0),
			'profile_id' => $profile->id
		));

		$max = Config::get('portfolio.types.'.$type->slug.'.max', 0);

		if($items->count() >= $max)
		{
			throw new ValidationException("Je mag maximaal {$max} items toevoegen van het type '{$type->name}'.", 1);
		}
	}

	protected function validateInput(Profile $profile, $data = array())
	{
		$type = $this->findPortfolioType((int) array_get($data, 'type'));
		$config = Config::get('portfolio.types.'.$type->slug, null);
		$this->validateCounts($profile, $type, $data);

		if($config)
		{
			$mediaType = array_get($data, 'media.type');
			switch($mediaType)
			{
				case 'image':
					$image = array_get($data, 'media.image');
					$config = array_get($config, $mediaType);

					if( ! $this->validateImageType($image))
					{
						throw new ValidationException("Afbeelding type moet een van de volgende types zijn: bmp, jpg, gif of png");
					}

					if( ! $this->validateImageSize($image, $config))
					{
						$width  = array_get($config, 'width');
						$height = array_get($config, 'height');

						throw new ValidationException("Afbeelding voor type '{$type->name}' moet minimaal {$width}x{$height} pixels zijn.");
					}
					break;
				case 'video':
					break;
			}
		}
	}

	public function validateImageType($image)
	{
		if($image instanceof UploadedFile)
		{
			return in_array($image->guessExtension(), array('jpeg', 'png', 'gif', 'bmp'));
		}
	}

	public function validateImageSize($image, $config)
	{
		$imageSize = getimagesize($image->getRealPath());
		list($width, $height) = $imageSize;

		foreach(array('width', 'height') as $key)
		{
			if($width < $config[$key])
			{
				return false;
			}
		}

		return true;
	}

	public function deletePortfolioItem(Item $item)
	{
		$mediaItem = $this->mediaService->findByModel($item);

		$this->mediaService->deleteByItem($mediaItem);

		return $this->itemRepo->delete($item->id);
	}
}
