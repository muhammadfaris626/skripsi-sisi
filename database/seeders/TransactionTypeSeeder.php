<?php

namespace Database\Seeders;

use App\Models\TransactionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code' => 'JT001',
                'name' => 'PEMBELIAN'
            ]
        ];

        foreach ($data as $key => $value) {
            TransactionType::create($value);
        }
    }
}
