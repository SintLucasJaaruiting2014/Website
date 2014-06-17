<?php namespace SintLucas\School\Transformer;

use League\Fractal\TransformerAbstract;
use SintLucas\School\Program;

class ProgramTransformer extends TransformerAbstract {

	public function transform(Program $program)
	{
		return array(
			'id'       => $program->id,
			'location' => $program->location->name,
			'name'     => $program->name
		);
	}

}
