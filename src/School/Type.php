<?php namespace SintLucas\School;

class Type {

	const TYPE_MBO_EHV = 1;
	const TYPE_MBO_BOX = 2;
	const TYPE_VMBO = 3;

	public static $types = array(
		self::TYPE_MBO_EHV => 'MBO Eindhoven',
		self::TYPE_MBO_BOX => 'MBO Boxtel'
		self::TYPE_VMBO => 'VMBO'
	);

}
