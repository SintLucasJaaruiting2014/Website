<?php namespace SintLucas\Media;

use SintLucas\Core\EloquentRepository;

class VideoRepository extends EloquentRepository {

	public function __construct(Video $model)
	{
		$this->model = $model;
	}

}
