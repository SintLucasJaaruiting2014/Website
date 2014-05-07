<?php namespace SintLucas\Api\Transformers\School;

use League\Fractal\TransformerAbstract;
use SintLucas\Domain\School\Models\Program;

class ProgramTransformer extends TransformerAbstract {

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
	public function transform(Program $program)
	{
		return $program->toArray();
	}

}
