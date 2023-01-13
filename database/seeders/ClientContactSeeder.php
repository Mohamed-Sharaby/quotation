<?php

namespace Database\Seeders;

use App\Models\ClientContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            [
                'client_id' => '1',
                'name' => 'client contact 1',
                'phone' => '16145t34185',
            ] ,[
                'client_id' => '2',
                'name' => 'client contact 2',
                'phone' => '16676885',
            ] ,[
                'client_id' => '3',
                'name' => 'client contact 3',
                'phone' => '161616185',
            ] ,[
                'client_id' => '4',
                'name' => 'client contact 4',
                'phone' => '436689900',
            ]
        ];

        foreach ($contacts as $contact){
            ClientContact::create($contact);
        }
    }
}
