<?php

return array(

	'students' => array(
		'path' => base_path('data/students.csv'),
		'type' => 'csv',
		'seeder' => 'SintLucas\Seeders\StudentSeeder'
	),

	'filters' => array(
		'path' => base_path('data/filters.yaml'),
		'type' => 'yaml',
		'seeder' => 'SintLucas\Seeders\FilterSeeder'
	),

);
