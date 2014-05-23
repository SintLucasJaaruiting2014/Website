<?php namespace SintLucas\Core;

use Illuminate\Routing\Controller;

class RestController extends Controller {

	protected function transform($response)
	{
		$class = $this->getTransformerClass($response);

		dd($class);
	}

	protected function getTransformerClass($obj)
	{
		return str_replace(array(
			'UseCases',
			'Response'
		), array(
			'Transformers',
			'Transformer',
		), get_class($obj));
	}

}
