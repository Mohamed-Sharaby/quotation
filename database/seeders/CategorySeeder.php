<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title'=>'category 1',
                'description'=>'description 1'
            ],
            [
                'title'=>'category 2',
                'description'=>'description 2'
            ],
            [
                'title'=>'category 3',
                'description'=>'description 3'
            ],
            [
                'title'=>'category 4',
                'description'=>'description 4'
            ],
        ];

        foreach ($categories as $category){
            Category::create($category);
        }
    }
}
