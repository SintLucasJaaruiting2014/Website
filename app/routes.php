<?php

Route::get('/', function()
{
	return Redirect::action('datacollector.controller@index');
});

// Route::get('{year}', 'frontend.controller@index')
// 	->where('year', '[0-9]+');
// Route::get('{year}/{slug}', 'frontend.controller@show')
// 	->where('year', '([0-9]+)');

Route::group(array('before' => 'auth'), function()
{
	Route::delete('logout', 'auth.controller@logout');

	Route::group(array('prefix' => 'inname'), function()
	{
		Route::get('/', 'datacollector.controller@index');
		Route::get('vragen', 'datacollector.controller@showQuestions');
		Route::post('vragen', 'datacollector.controller@handleQuestions');
		Route::get('filters', 'datacollector.controller@showFilters');
		Route::post('filters', 'datacollector.controller@handleFilters');
		Route::get('profiel', 'datacollector.controller@showProfile');
		Route::post('profiel', 'datacollector.controller@handleProfile');
		Route::get('portfolio/create', 'datacollector.controller@showCreatePortfolioItem');
		Route::post('portfolio', 'datacollector.controller@createPortfolioItem');
		Route::delete('portfolio/{id}', 'datacollector.controller@deletePortfolioItem');
	});

	Route::group(array('before' => 'role:admin'), function()
	{
		Route::get('admin', function()
		{
			return View::make('backend.app');
		});
	});
});
Route::group(array('before' => 'guest'), function()
{
	Route::get('login', 'auth.controller@showLogin');
	Route::post('login', 'auth.controller@login');
	Route::get('wachtwoord/reset/{token}', 'auth.controller@showPasswordReset');
	Route::post('wachtwoord/reset', 'auth.controller@passwordReset');
	Route::get('wachtwoord/vergeten', 'auth.controller@showReminder');
	Route::post('wachtwoord/vergeten', 'auth.controller@sendReminder');
});

Route::group(array('before' => 'auth|role:admin', 'prefix' => 'api/v1'), function()
{
	Route::group(array('prefix' => 'portfolio'), function()
	{
		Route::resource('item', 'api.controllers.portfolio.item');
		Route::resource('type', 'api.controllers.portfolio.type');
	});

	Route::group(array('prefix' => 'profile'), function()
	{
		Route::resource('answer', 'api.controllers.profile.answer');
		Route::resource('filter/option', 'api.controllers.profile.filteroption');
		Route::resource('filter', 'api.controllers.profile.filter');
		Route::resource('property', 'api.controllers.profile.property');
		Route::resource('question', 'api.controllers.profile.question');
		Route::resource('profile', 'api.controllers.profile');
	});

	Route::group(array('prefix' => 'school'), function()
	{
		Route::resource('location', 'api.controllers.school.location');
		Route::resource('program', 'api.controllers.school.program');
		Route::resource('type', 'api.controllers.school.type');
		Route::resource('year', 'api.controllers.school.year');
	});
});
