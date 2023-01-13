<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [
                'name' => 'client 1',
                'trn' => 'trn 1',
                'phone' => '161616185',
                'location' => 'Dubai',
            ] ,[
                'name' => 'client 2',
                'trn' => 'trn 2',
                'phone' => '161626185',
                'location' => 'Dubai',
            ] ,[
                'name' => 'client 3',
                'trn' => 'trn 3',
                'phone' => '161633385',
                'location' => 'Dubai',
            ] ,[
                'name' => 'client 4',
                'trn' => 'trn 4',
                'phone' => '16164445',
                'location' => 'Dubai',
            ]
        ];

        foreach ($clients as $client){
            Client::create($client);
        }
    }
}
