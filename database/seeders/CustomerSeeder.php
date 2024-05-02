<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 5,
                'nasabah_id' => '101120238535',
                'name' => 'Nasabah 1',
                'email' => 'nasabah1@gmail.com',
                'birth_place' => 'Makassar',
                'birth_date' => now(),
                'phone' => '08122222222',
                'address' => 'Jalan raya 1',
                'card_number' => '123-123-123-123'
            ],
            // [
            //     'name' => 'Nasabah 2',
            //     'email' => 'nasabah2@gmail.com',
            //     'birth_place' => 'Makassar',
            //     'birth_date' => now(),
            //     'phone' => '0813333333',
            //     'address' => 'Jalan raya 2',
            //     'card_number' => '456-456-456-456'
            // ],
        ];
        foreach ($data as $key => $value) {
            Customer::create($value);
        }
    }
}
