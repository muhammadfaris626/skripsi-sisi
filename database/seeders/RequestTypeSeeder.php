<?php

namespace Database\Seeders;

use App\Models\RequestType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code' => 'JP001',
                'name' => 'Transaksi Gagal',
            ],
            [
                'code' => 'JP002',
                'name' => 'Penggantian Kartu',
            ],
            [
                'code' => 'JP003',
                'name' => 'Pembukaan Blokir Kartu'
            ],
            [
                'code' => 'JP004',
                'name' => 'Kartu Hilang/Pemblokiran'
            ],
            [
                'code' => 'JP005',
                'name' => 'Permintaan CCTV'
            ],
            [
                'code' => 'JP006',
                'name' => 'Perubahan Data Nasabah'
            ],
            [
                'code' => 'JP007',
                'name' => 'Reset PIN'
            ],
            [
                'code' => 'JP008',
                'name' => 'Perubahan Jenis Kartu'
            ],
            [
                'code' => 'JP009',
                'name' => 'Permintaan PIN Baru'
            ]
        ];
        foreach ($data as $key => $value) {
            RequestType::create($value);
        }
    }
}
