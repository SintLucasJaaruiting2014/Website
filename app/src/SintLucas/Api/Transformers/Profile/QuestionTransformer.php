<?php namespace SintLucas\Api\Transformers\Profile;

use League\Fractal\TransformerAbstract;
use SintLucas\Domain\Profile\Models\Question;

class QuestionTransformer extends TransformerAbstract {

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
	public function transform(Question $question)
	{
		return $question->toArray();
	}

}
