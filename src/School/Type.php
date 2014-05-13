<?php namespace SintLucas\School;

class Type {

	const MBO_BOX = 1;
	const MBO_EHV = 2;
	const VMBO = 3;

	public static $types = array(
		self::MBO_BOX => 'MBO Boxtel',
		self::MBO_EHV => 'MBO Eindhoven',
		self::VMBO => 'VMBO'
	);

}
