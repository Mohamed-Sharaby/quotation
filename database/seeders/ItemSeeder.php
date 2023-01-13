<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'title'=>'item 1',
                'description'=>'description item 1',
                'category_id'=>'1',
                'service_id'=>'1',
                'quantity'=>'23',
                'item_price'=>'112',
                'selling_price'=>'120',
//                'discount'=>'',
            ],
            [
                'title'=>'item 2',
                'description'=>'description item 2',
                'category_id'=>'2',
                'service_id'=>'2',
                'quantity'=>'5',
                'item_price'=>'90',
                'selling_price'=>'300',
//                'discount'=>'',
            ],
            [
                'title'=>'item 3',
                'description'=>'description item 3',
                'category_id'=>'3',
                'service_id'=>'3',
                'quantity'=>'85',
                'item_price'=>'500',
                'selling_price'=>'1600',
//                'discount'=>'',
            ],
            [
                'title'=>'item 4',
                'description'=>'description item 4',
                'category_id'=>'4',
                'service_id'=>'4',
                'quantity'=>'66',
                'item_price'=>'352',
                'selling_price'=>'645',
//                'discount'=>'',
            ],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
