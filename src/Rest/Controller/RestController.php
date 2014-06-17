<?php namespace SintLucas\Rest\Controller;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Response;
use SintLucas\CommandBus\CommandBus;
use SintLucas\Core\SeedGenerator;
use SintLucas\Rest\Response\Transformer;

class RestController extends Controller {

	protected $app;
	protected $bus;
	protected $request;
	protected $session;

	public function __construct(CommandBus $bus, Request $request, SessionManager $session, Transformer $transformer)
	{
		$this->bus         = $bus;
		$this->request     = $request;
		$this->session     = $session;
		$this->transformer = $transformer;
	}

	public function json($data)
	{
		$data = $this->transformer->transform($data);

		return Response::json($data->toArray(), 200);
	}
}
