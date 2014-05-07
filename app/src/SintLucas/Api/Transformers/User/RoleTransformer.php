<?php namespace SintLucas\Api\Transformers\User;

use League\Fractal\TransformerAbstract;
use SintLucas\Domain\User\Models\Role;

class RoleTransformer extends TransformerAbstract {

	/**
	 * List of resources possible to embed via this transformer
	 *
	 * @var array
	 */
	protected $availableEmbeds = array();

	/**
	 * Turn this item object into a generic array
	 *
	 * @return array
	 */
	public function transform(Role $role)
	{
		return $role->toArray();
	}

}
