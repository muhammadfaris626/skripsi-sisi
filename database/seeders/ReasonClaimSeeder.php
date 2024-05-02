<?php

namespace Database\Seeders;

use App\Models\ReasonClaim;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReasonClaimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code' => 'AK001',
                'name' => 'Rekening Nasabah terdebet, namun transaksi pemindahbukuan dana tidak berhasil'
            ],
            [
                'code' => 'AK002',
                'name' => 'Rekening Nasabah terdebet, namun transaksi pembelian tidak berhasil'
            ],
            [
                'code' => 'AK003',
                'name' => 'Rekening Nasabah terdebet, namun transaksi pembayaran tidak berhasil'
            ],
            [
                'code' => 'AK004',
                'name' => 'Rekening Nasabah terdebet, namun Nasabah tidak pernah merasa melakukan transaksi'
            ],
            [
                'code' => 'AK005',
                'name' => 'Lain-lain'
            ]
        ];

        foreach ($data as $key => $value) {
            ReasonClaim::create($value);
        }
    }
}
