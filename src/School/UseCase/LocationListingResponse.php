<?php  namespace SintLucas\School\UseCase;

class LocationListingResponse {

	public $locations;

	public function __construct($locations)
	{
		$this->locations = $locations;
	}

}
