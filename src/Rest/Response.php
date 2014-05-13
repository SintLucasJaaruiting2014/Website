<?php namespace SintLucas\Rest;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Contracts\ArrayableInterface;
use SintLucas\Core\Paginator;

class Response extends JsonResponse {

	public function __construct($data = null, $message = null, $status = 200)
	{
		$data = $this->formatData($data, $message);

		parent::__construct($data, $status);
	}

	public function formatData($data, $message)
	{
		$formatted = array();

		if($data instanceof ArrayableInterface)
		{
			$data = $data->toArray();
		}

		if($data instanceof Paginator)
		{
			$formatted['paginator'] = array(
				'current' => $data->getCurrent(),
				'limit'   => $data->getLimit(),
				'total'   => $data->getTotal()
			);

			$data = $data->toArray();
		}

		$formatted['data'] = $data;

		if($message)
		{
			$formatted['message'] = $message;
		}

		return $formatted;
	}

}
