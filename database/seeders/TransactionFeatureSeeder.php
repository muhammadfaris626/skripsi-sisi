<?php

namespace Database\Seeders;

use App\Models\TransactionFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code' => 'FT001',
                'name' => 'PLN PRABAYAR'
            ],
        ];

        foreach ($data as $key => $value) {
            TransactionFeature::create($value);
        }
    }
}
