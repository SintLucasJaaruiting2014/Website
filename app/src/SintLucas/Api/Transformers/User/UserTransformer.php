<?php namespace SintLucas\Api\Transformers\User;

use League\Fractal\TransformerAbstract;
use SintLucas\Domain\User\Models\User;

class UserTransformer extends TransformerAbstract {

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
	public function transform(User $user)
	{
		return $user->toArray();
	}

}
