<?php namespace SintLucas\DataCollector;

use Illuminate\Routing\Controller;
use SintLucas\DataCollector\Views\FilterView;
use SintLucas\DataCollector\Views\ProfileView;
use SintLucas\DataCollector\Views\QuestionView;

class DataCollectorController extends Controller {

	public function index()
	{
		return new ProfileView();
	}

	public function showQuestions()
	{
		return new QuestionView();
	}

	public function handleQuestions()
	{
		//
	}

	public function showFilters()
	{
		return new FilterView();
	}

	public function handleFilters()
	{
		//
	}

}
