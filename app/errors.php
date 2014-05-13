<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
// use SintLucas\Core\Exception\SavingErrorException;
// use SintLucas\Core\Exception\ValidationException;

App::error(function(ModelNotFoundException $e)
{
	return Response::make('Record not found', 404);
});

// App::error(function(SavingErrorException $e)
// {
// 	return Redirect::back()->withInput();
// });

// /**
// * @todo  replace exception messages with translation strings.
// */
// App::error(function(ValidationException $e)
// {
// 	return Redirect::back()->withInput()->withErrors($e->getMessageBag())
// 		->with('error', $e->getMessage());
// });
