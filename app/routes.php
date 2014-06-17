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

// Route::get('images/{config}/{id}', 'SintLucas\Image\Controller\ImageController@show');

Route::group(array('prefix' => 'api'), function()
{
	Route::group(array('prefix' => 'v1'), function()
	{
		Route::group(array('prefix' => 'media'), function()
		{
			Route::resource('video', 'SintLucas\Media\Video\Controller\Api\VideoController');
			Route::resource('image', 'SintLucas\Media\Image\Controller\Api\ImageController');
			Route::resource('image/{imageId}/crop', 'SintLucas\Media\Image\Controller\Api\CropController');
		});

		Route::group(array('prefix' => 'filter'), function()
		{
			Route::resource('{filterId}/option', 'SintLucas\Filter\Controller\Api\OptionController');
		});

		Route::resource('filter', 'SintLucas\Filter\Controller\Api\FilterController');

		Route::group(array('prefix' => 'profile'), function()
		{
			Route::resource('{profileId}/answer', 'SintLucas\Question\Controller\Api\AnswerController');
			Route::resource('{profileId}/network', 'SintLucas\Profile\Controller\Api\NetworkController');
			Route::resource('{profileId}/property', 'SintLucas\Profile\Controller\Api\PropertyController');
			Route::resource('{profileId}/portfolio', 'SintLucas\Portfolio\Controller\Api\PortfolioController');
			Route::resource('{profileId}/socialmedia', 'SintLucas\Profile\Controller\Api\SocialMediaController');
		});

		Route::resource('profile', 'SintLucas\Profile\Controller\Api\ProfileController');

		Route::group(array('prefix' => 'school'), function()
		{
			Route::resource('location', 'SintLucas\School\Controller\Api\LocationController');
			Route::resource('program', 'SintLucas\School\Controller\Api\ProgramController');
		});

	});
});


// Route::get('migrate', function()
// {
// 	$migrator = App::make('SintLucas\Migration\OneToTwo');

// 	$migrator->run();
// });
