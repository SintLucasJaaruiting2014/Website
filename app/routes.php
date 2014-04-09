<?php

Route::get('/', function()
{
	return View::make('hello');
});


Route::group(['before' => ''], function()
{
	Route::get('inname', 'datacollector.controller@index');
});
