<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code' => 'KC-001',
                'name' => 'Kantor Cabang Syariah Makassar'
            ],
            [
                'code' => 'KC-002',
                'name' => 'Kantor Cabang Utama Makassar'
            ]
        ];

        foreach ($data as $key => $value) {
            Branch::create($value);
        }
    }
}
