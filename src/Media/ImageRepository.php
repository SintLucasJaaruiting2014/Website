<?php namespace SintLucas\Media;

use SintLucas\Core\EloquentRepository;

class ImageRepository extends EloquentRepository {

	public function __construct(Image $model)
	{
		$this->model = $model;
	}

}
