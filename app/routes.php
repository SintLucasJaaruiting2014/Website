<?php

Route::get('/', array(
	'as'   => 'home',
	'uses' => 'FrontendController@index'
));

Route::get('/view/{id}', array(
	'as'   => 'profile',
	'uses' => 'FrontendController@showProfile'
));

Route::group(array('before' => 'guest'), function()
{
	Route::get('auth/login', array(
		'as'   => 'auth.show_login',
		'uses' => 'AuthController@showLogin'
	));
	Route::post('auth/login', array(
		'as'   => 'auth.login',
		'uses' => 'AuthController@login'
	));
});

Route::group(array('before' => ''), function()
{
	Route::get('profiles', 'SintLucas\Profile\Controllers\Api\ProfileController@index');
	Route::get('profiles/{id}', 'SintLucas\Profile\Controllers\Api\ProfileController@show');

	Route::get('question/answer', 'QuestionController@answer');
});

Route::group(array('prefix' => 'api'), function()
{
	Route::group(array('prefix' => 'v1'), function()
	{


	});
});


Route::get('migrate', function()
{
	$migrator = App::make('SintLucas\Migration\OneToTwo');

	$migrator->run();
});
