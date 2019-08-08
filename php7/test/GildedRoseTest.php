<?php

namespace App;

class GildedRoseTest extends \PHPUnit\Framework\TestCase {
    
    /**
     * @dataProvider coverArray
    */
    
    public function testOverAll( $name, $sellIn, $quality, $expectedQuality ) 
    {
        $items      = [ Item::itemFactory( $name, $sellIn, $quality ) ];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals( $expectedQuality, $items[0]->quality );
    }
    
    public function coverArray()
    {
        return [
            [ "foo", 5, 10, 9 ], // В конце дня наша система снижает значение обоих свойств для каждого товара
            [ "foo", 0, 10, 8 ], // После того, как срок храния прошел, качество товара ухудшается в два раза быстрее; 
            [ "foo", 0, 0, 0 ],  //Качество товара никогда не может быть отрицательным; 
            [ "Aged Brie", 12, 47, 48 ], //Для товара «Aged Brie» качество увеличивается пропорционально возрасту;
            [ "Aged Brie", 0, 48, 50], //Для товара «Aged Brie» качество увеличивается пропорционально возрасту;
            [ "Aged Brie", 0, 49, 50], //Для товара «Aged Brie» качество увеличивается пропорционально возрасту;
            [ "Aged Brie", 0, 50, 50], //  Качество товара никогда не может быть больше, чем 50;
            [ "Aged Brie", 10, 40, 41],
            [ "Aged Brie", 0, 40, 42],
            [ "Sulfuras, Hand of Ragnaros", 0, 40, 80], //«Sulfuras» является легендарным товаром,
            [ "Sulfuras, Hand of Ragnaros", 10, 10, 80], //  поэтому у него нет срока хранения 
            [ "Sulfuras, Hand of Ragnaros", 20, 10, 80], // и не подвержен ухудшению качества;
            [ "Backstage passes to a TAFKAL80ETC concert", 10, 0, 2 ], // Качество увеличивается на 2, когда до истечения срока хранения 10 
            [ "Backstage passes to a TAFKAL80ETC concert", 9, 2, 4 ], // или менее дней
            [ "Backstage passes to a TAFKAL80ETC concert", 5, 0, 3 ], //на 3, если до истечения 5
            [ "Backstage passes to a TAFKAL80ETC concert", 1, 10, 13 ], //  или менее дней
            [ "Backstage passes to a TAFKAL80ETC concert", 10, 50, 50 ], //  Качество товара никогда не может быть больше, чем 50;
            [ "Backstage passes to a TAFKAL80ETC concert", 0, 10, 0 ], // При этом качество падает до 0 после даты проведения концерта.
            [ "Conjured Mana Cake", 5, 10, 8  ],    // товары теряют качество в два раза быстрее, 
            [ "Conjured Mana Cake", 0, 10, 6 ],     // чем обычные товары.;
            [ "Conjured Mana Cake", 0, 0, 0 ],      // чем обычные товары.; 
        ];
    }

}
