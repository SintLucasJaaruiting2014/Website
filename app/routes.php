<?php


Route::group(array('prefix' => 'api'), function()
{
	Route::group(array('prefix' => 'v1'), function()
	{
		Route::resource('media/image/{id}/crop', 'SintLucas\Media\CropController');
		Route::resource('media/image', 'SintLucas\Media\ImageController');
		Route::resource('media/video', 'SintLucas\Media\VideoController');

		Route::resource('filter/{id}/options', 'SintLucas\Filter\OptionController');
		Route::resource('filter', 'SintLucas\Filter\FilterController');

		Route::resource('profile/question', 'SintLucas\Profile\Question\QuestionController');
		Route::resource('profile/{id}/answer', 'SintLucas\Profile\Question\AnswerController');
		Route::resource('profile/{id}/portfolio', 'SintLucas\Portfolio\ItemController');
		Route::resource('profile', 'SintLucas\Profile\ProfileController');

		Route::resource('school/program', 'SintLucas\School\ProgramController');

	});
});


Route::get('migrate', function()
{
	$migrator = App::make('SintLucas\Migration\OneToTwo');

	$migrator->run();
});
