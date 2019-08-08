<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\GildedRose;
use App\Item;

echo "OMGHAI!\n";

$items = array(
    Item::itemFactory('+5 Dexterity Vest', 10, 20),
    Item::itemFactory('Aged Brie', 2, 0),
    Item::itemFactory('Elixir of the Mongoose', 5, 7),
    Item::itemFactory('Sulfuras, Hand of Ragnaros', 0, 80),
    Item::itemFactory('Sulfuras, Hand of Ragnaros', -1, 80),
    Item::itemFactory('Backstage passes to a TAFKAL80ETC concert', 15, 20),
    Item::itemFactory('Backstage passes to a TAFKAL80ETC concert', 10, 49),
    Item::itemFactory('Backstage passes to a TAFKAL80ETC concert', 5, 49),
    // this conjured item does not work properly yet
    Item::itemFactory('Conjured Mana Cake', 3, 6)
);

$app = new GildedRose($items);

$days = 2;
if (count($argv) > 1) {
    $days = (int) $argv[1];
}

for ($i = 0; $i < $days; $i++) {
    echo("-------- day $i --------\n");
    echo("name, sellIn, quality\n");
    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }
    echo PHP_EOL;
    $app->updateQuality();
}
