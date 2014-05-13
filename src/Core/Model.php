<?php namespace SintLucas\Core;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel implements PresentableInterface {

	public function newCollection(array $models = array())
	{
		return new Collection($models);
	}

	public function present()
	{
		$class = $this->getPresenterClass();

		return new $class($this);
	}

	protected function getPresenterClass()
	{
		return sprintf('%sPresenter', get_class($this));
	}

}
