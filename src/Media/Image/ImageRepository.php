<?php namespace SintLucas\Media\Image;

use SintLucas\Core\EloquentRepository;

class ImageRepository extends EloquentRepository {

	public function __construct(Image $model)
	{
		$this->model = $model;
	}

	public function getPaginated($perPage = 30)
	{
		return $this->model->paginate($perPage);
	}

}
