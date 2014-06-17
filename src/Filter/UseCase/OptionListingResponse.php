<?php namespace SintLucas\Filter\UseCase;

class OptionListingResponse {

	public $options;

	public function __construct($options)
	{
		$this->options = $options;
	}

}
