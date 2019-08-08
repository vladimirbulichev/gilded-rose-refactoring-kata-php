<?php

namespace App;

final class GildedRose {

    private $items = [];

    public function __construct($items) {
        $this->items = $items;
    }

    public function updateQuality() {
        foreach ($this->items as $item) {
            $this->updateItemQuality( $item );
        }
    }
    
    private function updateItemQuality( Item $item )
    {
        $item->updateItemQuality();
//        switch ( $item->name ) 
//        {
//            case 'Aged Brie' :         {
//                if ($item->quality < 50) {
//                    $item->quality = $item->quality + 1;
//                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
//                    }
//                }
//
//                $item->sell_in = $item->sell_in - 1;
//
//                if ($item->sell_in < 0) {
//                    if ($item->quality < 50) {
//                        $item->quality = $item->quality + 1;
//                    }
//                }
//                break;
//            }
//            case 'Backstage passes to a TAFKAL80ETC concert' : {
//                if ($item->quality < 50) {
//                    $item->quality = $item->quality + 1;
//                    if ($item->sell_in < 11) {
//                        if ($item->quality < 50) {
//                            $item->quality = $item->quality + 1;
//                        }
//                    }
//                    if ($item->sell_in < 6) {
//                        if ($item->quality < 50) {
//                            $item->quality = $item->quality + 1;
//                        }
//                    }
//                }
//
//                $item->sell_in = $item->sell_in - 1;
//
//                if ($item->sell_in < 0) {
//                    $item->quality = $item->quality - $item->quality;
//                }                
//                break;                
//            }
//            case 'Sulfuras, Hand of Ragnaros' :{
//                if ($item->quality > 0) {
//                    $item->quality = 80;
//                }
//                break;
//            }
//            default :
//                if ($item->quality > 0) {
//                    $item->quality = $item->quality - 1;
//                }
//
//                $item->sell_in = $item->sell_in - 1;
//
//                if ($item->sell_in < 0) {
//                    if ($item->quality > 0) {
//                        $item->quality = $item->quality - 1;
//                    }
//                }                      
//        }
    }
}

