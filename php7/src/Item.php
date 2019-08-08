<?php

namespace App;

/*final*/ class Item {

    public $name;
    public $sell_in;
    public $quality;
    const MAX_QUALITY = 50;
    const DEGRADE_QUALITY = 1;

    function __construct($name, $sell_in, $quality) {
        $this->name    = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
    
    public static function itemFactory( $name, $sell_in, $quality )
    {
        switch ( $name ) {
            case "Aged Brie" : 
                return new AgedBrie( $sell_in, $quality );
            case "Sulfuras, Hand of Ragnaros" :
                return new Sulfuras( $sell_in, $quality );
            case "Backstage passes to a TAFKAL80ETC concert" :
                return new Backstage( $sell_in, $quality );
            case "Conjured Mana Cake" :
                return new Conjured($sell_in, $quality);
            default :
                return new Item( $name, $sell_in, $quality );
        }
    }
    
    public function updateItemQuality()
    {
        if ($this->quality > 0) {
            $this->quality = $this->quality - static::DEGRADE_QUALITY;
        }
        $this->sell_in = $this->sell_in - 1;

        if ($this->sell_in < 0) {
            if ($this->quality > 0) {
                $this->quality = $this->quality - static::DEGRADE_QUALITY;
            }
        } 
    }
}

