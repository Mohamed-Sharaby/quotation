<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'title'=>'section 1',
                'description'=>'description 1'
            ],
            [
                'title'=>'section 2',
                'description'=>'description 2'
            ],
            [
                'title'=>'section 3',
                'description'=>'description 3'
            ],
            [
                'title'=>'section 4',
                'description'=>'description 4'
            ],
        ];

        foreach ($sections as $section){
            Section::create($section);
        }
    }
}
