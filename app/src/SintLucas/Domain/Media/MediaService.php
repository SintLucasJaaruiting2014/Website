<?php namespace SintLucas\Domain\Media;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use SintLucas\Domain\Media\Repos\ItemRepo;
use SintLucas\Domain\Media\Repos\TypeRepo;

class MediaService {

	/**
	 * Item repository instance.
	 *
	 * @var \SintLucas\Domain\Media\Repos\ItemRepo
	 */
	protected $itemRepo;

	/**
	 * Config
	 *
	 * @var array
	 */
	protected $config;

	/**
	 * types
	 *
	 * @var array
	 */
	protected $types;

	/**
	 * Create a new media service instance.
	 *
	 * @param \SintLucas\Domain\Media\Repos\ImageRepo $itemRepo
	 * @param \SintLucas\Domain\Media\Repos\TypeRepo  $typeRepo
	 */
	public function __construct(ItemRepo $itemRepo)
	{
		$this->itemRepo = $itemRepo;
		$this->config   = Config::get('media');
	}

	public function getMediaTypes()
	{
		if(is_null($this->types))
		{
			$this->types = array_get($this->config, 'types', array());
		}

		return array_pluck($this->types, 'name', 'slug');
	}

	public function getMediaTypeConfig($key)
	{
		return array_get($this->getMediaTypes(), $key);
	}

	public function findByModel($model)
	{
		return $this->itemRepo->findBy(array(
			'linkable_id' => $model->id,
			'linkable_type' => get_class($model)
		));
	}

	public function createItemForModel($model, $data = array())
	{
		$type = array_get($data, 'type');
		$value = $this->getValue($type, $data);

		$item = $this->itemRepo->create(array(
			'linkable_id'   => $model->id,
			'linkable_type' => get_class($model),
			'type'          => $type,
			'value'         => $value
		));

		$this->storeMedia($item, $type, $data);

		return $item;
	}

	public function storeMedia($item, $type, $data)
	{
		switch($type)
		{
			case 'image':
				return $this->storeImage($item, $data['image']);
		}
	}

	protected function storeImage($model, $image)
	{
		$directory = $this->getStoragePath();

		$image->move($directory, $model->filename);
	}

	protected function getValue($type, $data)
	{
		switch($type)
		{
			case 'image':
				$image = array_get($data, 'image');
				return $image->guessClientExtension();

			case 'video':
				return array_get($data, 'video');
		}
	}

	public function deleteByItem($model)
	{
		if($this->isFile($model, $model))
		{
			$this->deleteFile($model);
		}

		return $this->itemRepo->delete($model->id);
	}

	protected function isFile($model)
	{
		$config = $this->getMediaTypeConfig($model->type);

		return array_get($config, 'is_file', false);
	}

	protected function deleteFile($model)
	{
		$path = $this->getFilePath($model->filename);

		return File::delete($path);
	}

	public function getFilePath($value)
	{
		return $this->getStoragePath().'/'.$value;
	}

	protected function getStoragePath()
	{
		return array_get($this->config, 'storage.path');
	}
}
