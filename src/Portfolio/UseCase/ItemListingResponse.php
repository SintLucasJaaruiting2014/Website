<?php namespace SintLucas\Portfolio\UseCase;

class ItemListingResponse {

	public $items;

	public function __construct($items)
	{
		$this->items = $items;
	}

}
