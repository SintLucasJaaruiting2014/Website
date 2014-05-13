<?php namespace SintLucas\Media\Crop;

use SintLucas\Core\EloquentRepository;

class CropRepository extends EloquentRepository {

	public function __construct(Crop $model)
	{
		$this->model = $model;
	}

}
