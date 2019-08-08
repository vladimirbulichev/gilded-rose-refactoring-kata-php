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
class AgedBrie extends Item {
    //put your code here
    public function __construct( $sell_in, $quality ) {
        parent::__construct( "Aged Brie", $sell_in, $quality);
    }
    
    public function updateItemQuality()
    {
        if ($this->quality < self::MAX_QUALITY ) {
            $this->quality = $this->quality + 1;
        }

        $this->sell_in = $this->sell_in - 1;

        if ($this-> sell_in < 0) {
            if ($this->quality < self::MAX_QUALITY ) {
                $this->quality = $this->quality + 1;
            }
        }
    }
    
}
