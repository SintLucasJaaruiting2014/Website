<?php namespace SintLucas\Portfolio\UseCase;

use SintLucas\Portfolio\Item;

class FindItemResponse {

	public $item;

	public function __construct(Item $item)
	{
		$this->item = $item;
	}

}
