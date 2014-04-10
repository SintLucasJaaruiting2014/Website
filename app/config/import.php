<?php

return array(

	'students' => array(
		'path' => base_path('data/students.csv'),
		'type' => 'csv',
		'seeder' => 'SintLucas\Seeds\StudentSeeder'
	),

	'filters' => array(
		'path' => base_path('data/filters.yaml'),
		'type' => 'yaml',
		'seeder' => 'SintLucas\Seeds\FilterSeeder'
	),

	'questions' => array(
		'path' => base_path('data/questions.yaml'),
		'type' => 'yaml',
		'seeder' => 'SintLucas\Seeds\QuestionSeeder'
	),

);
