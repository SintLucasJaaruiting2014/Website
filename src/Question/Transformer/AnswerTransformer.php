<?php namespace SintLucas\Question\Transformer;

use League\Fractal\TransformerAbstract;
use SintLucas\Question\Answer;

class AnswerTransformer extends TransformerAbstract {

	public function transform(Answer $answer)
	{
		return array(
			'id'       => (int) $answer->id,
			'value'    => $answer->value,
			'question' => array(
				'id'    => $answer->question->id,
				'label' => $answer->question->label,
			)
		);
	}
}
