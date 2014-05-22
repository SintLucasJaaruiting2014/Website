<?php

abstract class BaseController extends Controller {

	protected $title;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function renderView($name, $parameters = array())
	{
		$this->layout->title = $this->title;
		$this->layout->content = View::make($name, $parameters);

		return $this->layout;
	}

}
