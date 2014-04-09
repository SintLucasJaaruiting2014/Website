<?php namespace SintLucas\Core;

use Illuminate\Support\Facades\View as IlluminateView;

abstract class View {

	/**
	 * The view data.
	 *
	 * @var mixed
	 */
	protected $data;

	/**
	 * The view file.
	 *
	 * @var string
	 */
	protected $view;

	/**
	 * Create a new view instance.
	 *
	 * @param array $data
	 */
	public function __construct($data = array())
	{
		$this->data = $data;
	}

	/**
	 * Render the view.
	 *
	 * @return string
	 */
	public function render()
	{
		$view = IlluminateView::make($this->view);

		$this->setup($view);

		return $view->render();
	}

	/**
	 * Setup the view.
	 *
	 * @param  \Illuminate\View\View $view
	 * @return void
	 */
	public function setup(&$view)
	{
		$view->with($this->data);
	}

	/**
	 * Render the view when used as a string.
	 *
	 * @return string
	 */
	public function __toString()
	{
		try {
			return (string) $this->render();
		} catch (\Exception $e) {
			return sprintf('An error occured: %s', $e->getMessage());
		}
	}

}
