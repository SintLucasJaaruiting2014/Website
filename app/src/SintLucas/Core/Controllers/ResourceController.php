<?php namespace SintLucas\Core\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use SintLucas\Core\Interfaces\CrudRepoInterface;

class ResourceController extends Controller {

	protected $repo;
	protected $name;

	public function __construct(CrudRepoInterface $repo)
	{
		$this->repo = $repo;
	}

	public function getViewName($action)
	{
		return sprintf('backend.%s.%s', $this->name, $action);
	}

	public function view($action, $data = array())
	{
		$name = $this->getViewName($action);

		return View::make($name, $data);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = $this->repo->all();

		return $this->view('index', compact('items'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->view('create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::get();

		return $this->repo->create($data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $this->repo->find($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
