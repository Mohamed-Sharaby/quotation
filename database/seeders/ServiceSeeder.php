<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name'=>'service 1',
            ],
            [
                'name'=>'service 2',
            ],
            [
                'name'=>'service 3',
            ],
            [
                'name'=>'service 4',
            ],
        ];

        foreach ($services as $service){
            Service::create($service);
        }
    }
}
