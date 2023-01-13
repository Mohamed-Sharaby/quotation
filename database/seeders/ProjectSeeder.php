<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            [
                'type' => 'type 1',
                'name' => 'name 1',
                'size' => 'size 1',
                'date' => '2010-5-5',
                'client_ref' => 'ref',
                'country' => 'UAE!',
                'city' => 'Dubai 1',
                'address' => 'tecom',
                'client_id' => '1',
                'client_contact_id' => '3',
                'payment_terms' => 'terms 111'
            ], [
                'type' => 'type 2',
                'name' => 'name 2',
                'size' => 'size 2',
                'date' => '2020-5-5',
                'client_ref' => 'ref',
                'country' => 'UAE!',
                'city' => 'Dubai 1',
                'address' => 'tecom',
                'client_id' => '2',
                'client_contact_id' => '2',
                'payment_terms' => 'terms 222'
            ], [
                'type' => 'type 3',
                'name' => 'name 3',
                'size' => 'size 3',
                'date' => '2015-8-5',
                'client_ref' => 'ref',
                'country' => 'UAE!',
                'city' => 'Dubai 1',
                'address' => 'tecom',
                'client_id' => '3',
                'client_contact_id' => '3',
                'payment_terms' => 'terms 333'
            ]
        ];

        foreach ($projects as $project){
            Project::create($project);
        }
    }
}
