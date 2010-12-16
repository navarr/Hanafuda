<?php

	/* Hanafuda

		0 = January 	(Pine)
		1 = February	(Plum Blossoms)
		2 = March	(Cherry Blossoms)
		3 = April	(Wisteria)
		4 = May		(Iris)
		5 = June	(Peony)
		6 = July	(Clover)
		7 = August	(Pampas)
		8 = September	(Chrysanthemum)
		9 = October	(Maple)
		10= November	(Willow)
		11= December	(Paulownia)

		Each of these is an array of the suit
		- array(id,month,points,flags)
		Flags:
		1  = Akatan
		2  = Aotan
		4  = Moon/Banner (Viewer Card)
		8  = Sake Cup (Wild)
		16 = Inoshikachou
		32 = Rainman
		64 = Lightning
	*/

class Hanafuda
{
	protected $STANDARD_DECK = array
	(
		// Pine
		array(0,0,1,0),
		array(1,0,1,0),
		array(2,0,5,1),
		array(3,0,20,0),
		// Plum Blossoms
		array(4,1,1,0),
		array(5,1,1,0),
		array(6,1,5,1),
		array(7,1,10,0),
		// Cherry Blossoms
		array(8,2,1,0),
		array(9,2,1,0),
		array(10,2,5,1),
		array(11,2,20,4),
		// Wisteria
		array(12,3,1,0),
		array(13,3,1,0),
		array(14,3,5,0),
		array(15,3,10,0),
		// Iris
		array(16,4,1,0),
		array(17,4,1,0),
		array(18,4,5,0),
		array(19,4,10,0),
		// Peony
		array(20,5,1,0),
		array(21,5,1,0),
		array(22,5,5,2),
		array(23,5,10,16),
		// Clover
		array(24,6,1,0),
		array(25,6,1,0),
		array(26,6,5,0),
		array(27,6,10,16),
		// Pampas
		array(28,7,1,0),
		array(29,7,1,0),
		array(30,7,10,0),
		array(31,7,20,4),
		// Chrysanthemum
		array(32,8,1,0),
		array(33,8,1,0),
		array(34,8,5,2),
		array(35,8,10,8),
		// Maple
		array(36,9,1,0),
		array(37,9,1,0),
		array(38,9,5,2),
		array(39,9,10,16),
		// Willow
		array(40,10,1,64),
		array(41,10,5,0),
		array(42,10,10,0),
		array(43,10,20,32),
		// Paulownia
		array(44,11,1,0),
		array(45,11,1,0),
		array(46,11,1,0),
		array(47,11,20,0)
	);
}