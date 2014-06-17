<?php  namespace SintLucas\School\UseCase;

use SintLucas\School\Location;

class FindLocationResponse {

	public $location;

	public function __construct(Location $location)
	{
		$this->location = $location;
	}

}
