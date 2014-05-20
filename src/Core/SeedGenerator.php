<?php namespace SintLucas\Core;

use Illuminate\Support\Str;

class SeedGenerator {

	public function generate()
	{
		return Str::random();
	}

}
