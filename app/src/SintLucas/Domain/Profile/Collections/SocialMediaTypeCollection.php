<?php namespace SintLucas\Domain\Profile\Collections;

use Illuminate\Database\Eloquent\Collection;

class SocialMediaTypeCollection extends Collection {

	public function getSelectList()
	{
		$list = array('' => 'Kies een type');

		foreach($this->lists('name', 'id') as $id => $name)
		{
			$list[$id] = $name;
		}

		return $list;
	}

}
