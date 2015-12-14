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

class hanafuda
{
    protected $STANDARD_DECK = 
    [
        // Pine
        [0, 0, 1, 0],
        [1, 0, 1, 0],
        [2, 0, 5, 1],
        [3, 0, 20, 0],
        // Plum Blossoms
        [4, 1, 1, 0],
        [5, 1, 1, 0],
        [6, 1, 5, 1],
        [7, 1, 10, 0],
        // Cherry Blossoms
        [8, 2, 1, 0],
        [9, 2, 1, 0],
        [10, 2, 5, 1],
        [11, 2, 20, 4],
        // Wisteria
        [12, 3, 1, 0],
        [13, 3, 1, 0],
        [14, 3, 5, 0],
        [15, 3, 10, 0],
        // Iris
        [16, 4, 1, 0],
        [17, 4, 1, 0],
        [18, 4, 5, 0],
        [19, 4, 10, 0],
        // Peony
        [20, 5, 1, 0],
        [21, 5, 1, 0],
        [22, 5, 5, 2],
        [23, 5, 10, 16],
        // Clover
        [24, 6, 1, 0],
        [25, 6, 1, 0],
        [26, 6, 5, 0],
        [27, 6, 10, 16],
        // Pampas
        [28, 7, 1, 0],
        [29, 7, 1, 0],
        [30, 7, 10, 0],
        [31, 7, 20, 4],
        // Chrysanthemum
        [32, 8, 1, 0],
        [33, 8, 1, 0],
        [34, 8, 5, 2],
        [35, 8, 10, 8],
        // Maple
        [36, 9, 1, 0],
        [37, 9, 1, 0],
        [38, 9, 5, 2],
        [39, 9, 10, 16],
        // Willow
        [40, 10, 1, 64],
        [41, 10, 5, 0],
        [42, 10, 10, 0],
        [43, 10, 20, 32],
        // Paulownia
        [44, 11, 1, 0],
        [45, 11, 1, 0],
        [46, 11, 1, 0],
        [47, 11, 20, 0],
    ];
}
