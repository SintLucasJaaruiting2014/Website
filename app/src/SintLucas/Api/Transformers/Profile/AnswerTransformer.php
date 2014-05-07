<?php namespace SintLucas\Api\Transformers\Profile;

use League\Fractal\TransformerAbstract;
use SintLucas\Domain\Profile\Models\Answer;

class AnswerTransformer extends TransformerAbstract {

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
	public function transform(Answer $answer)
	{
		return array(
			'id' => (int) $answer->id,
			'question' => $answer->question->label,
			'value' => $answer->value
		);
	}

}
