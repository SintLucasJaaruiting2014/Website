<?php namespace SintLucas\Core;

use Illuminate\Support\Contracts\ArrayableInterface;
use Illuminate\Support\Str;

abstract class Presenter implements ArrayableInterface {

	protected $model;
	protected $fields;

	public function __construct($model)
	{
		$this->model = $model;
	}

	public function toArray()
	{
		$data = array();
		foreach($this->fields as $field)
		{
			$data[$field] = $this->getFieldData($field);
		}

		return $data;
	}

	public function getFieldData($field)
	{
		$method = sprintf('get%sField', Str::camel($field));
		$data = $this->model->$field;

		if(method_exists($this, $method))
		{
			$data = $this->$method($data);
		}

		if($data instanceof PresentableInterface)
		{
			$data = $data->present()->toArray();
		}

		return $data;
	}

	public function __get($field)
	{
		return $this->getFieldData($field);
	}
}
