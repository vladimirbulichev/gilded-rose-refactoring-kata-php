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
class Sulfuras extends Item {
    //put your code here
    public function __construct( $sell_in, $quality ) {
        parent::__construct( "Sulfuras, Hand of Ragnaros", $sell_in, $quality);
    }
    
    public function updateItemQuality()
    {
        $this->quality = 80;
    }
    
}
