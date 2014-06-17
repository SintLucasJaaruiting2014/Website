<?php namespace SintLucas\Media\Image;

use SintLucas\Core\EloquentRepository;

class CropRepository extends EloquentRepository {

	public function __construct(Crop $model)
	{
		$this->model = $model;
	}

	public function getBy(Image $image)
	{
		$query = $this->model->newQuery();

		return $query->where('image_id', $image->id)->get();
	}

	public function findByImageAndConfig(Image $image, $config)
	{
		$query = $this->model->newQuery();

		return $query->where('image_id', '=', $image->id)
			->where('key', '=', $config)
			->first();
	}

}
