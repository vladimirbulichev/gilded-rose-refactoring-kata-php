<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of AgedBie
 *
 * @author vvb
 */
class Conjured extends Item {
    //put your code here
    const DEGRADE_QUALITY = 2;

    public function __construct( $sell_in, $quality ) {
        parent::__construct( "Conjured Mana Cake", $sell_in, $quality);
    }
}
