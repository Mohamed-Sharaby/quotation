<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quotations = [
            [
                'date' => '2020-1-1',
                'user_id' => '1',
                'project_id' => '2',
                'version' => '1',
                'status' => 'pending',
                'notes' => 'aaaaaaaaaaaaaaa',
                'items' => [
                    ['item_id' => '1'],
                    ['item_id' => '2']
                ]
            ]
        ];


    }
}
