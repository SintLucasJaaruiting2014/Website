<?php namespace SintLucas\Media\Image\Transformer;

use Illuminate\Routing\UrlGenerator;
use League\Fractal\TransformerAbstract;
use SintLucas\Media\Image\Image;

class ImageTransformer extends TransformerAbstract {

	protected $availableIncludes = array();

	public function __construct(UrlGenerator $url)
	{
		$this->url = $url;
	}

	public function transform(Image $image)
	{
		return array(
			'id'        => $image->id,
			'filename'  => $image->filename,
			'grid'     => $this->url->route('imagecache', array('grid', $image->filename)),
			'profile'    => $this->url->route('imagecache', array('profile', $image->filename)),
			'network'     => $this->url->route('imagecache', array('network', $image->filename))
		);
	}

}
