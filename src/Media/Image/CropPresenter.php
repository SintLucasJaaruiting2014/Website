<?php namespace SintLucas\Media\Crop;

use SintLucas\Core\Presenter;

class CropPresenter extends Presenter {

	protected $fields = array(
		'id',
		'key',
		'x',
		'y',
		'width',
		'height'
	);

}
