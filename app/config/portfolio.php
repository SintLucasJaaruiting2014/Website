<?php

return array(
	'items' => array(
		'max' => 12
	),
	'types' => array(
		'website' => array(
			'max' => 6,
			'types' => array(
				'image' => array(
					'width'  => 1200,
					'height' => 400
				),
				'video' => array(
					'type' => array(
						'youtube',
						'vimeo'
					)
				)
			),
		),
		'book' => array(
			'max' => 1,
			'types' => array(
				'image' => array(
					'width'  => 660,
					'height' => 830
				)
			)
		),
	),
);
