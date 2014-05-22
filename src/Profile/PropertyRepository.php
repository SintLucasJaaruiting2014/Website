<?php namespace SintLucas\Profile;

class PropertyRepository {

	protected $model;

	public function __construct(Property $model)
	{
		$this->model = $model;
	}

}
