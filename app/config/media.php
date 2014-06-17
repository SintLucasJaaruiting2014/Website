<?php

return array(

	'storage' => array(
		'path' => storage_path('images')
	),

	'types' => array(

		'image' => array(
			'name'    => 'Image',
			'slug'    => 'image',
			'is_file' => true
		),
		'video' => array(
			'name'    => 'Video',
			'slug'    => 'video',
			'is_file' => false
		)

	),

);
