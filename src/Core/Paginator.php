<?php namespace SintLucas\Core;

class Paginator {

	protected $items;
	protected $current;
	protected $limit;
	protected $total;

	public function __construct($items = array(), $current, $limit, $total)
	{
		$this->items   = new Collection($items);
		$this->current = $current;
		$this->limit   = $limit;
		$this->total   = $total;
	}

	public function getCurrent()
	{
		return $this->current;
	}

	public function getLimit()
	{
		return $this->limit;
	}

	public function getTotal()
	{
		return $this->total;
	}

	public function toArray()
	{
		return $this->items->present()->toArray();
	}

}
