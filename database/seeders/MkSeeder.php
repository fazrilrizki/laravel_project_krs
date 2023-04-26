<?php

namespace Database\Seeders;

use App\Models\MkModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MkModel::create([
            'kodemk' => '410100001',
            'namamk' => 'Logika dan Algoritma',
            'semester' => 1,
            'sks' => 3,
        ]);

        MkModel::create([
            'kodemk' => '410100002',
            'namamk' => 'Agama',
            'semester' => 1,
            'sks' => 3,
        ]);

        MkModel::create([
            'kodemk' => '410100003',
            'namamk' => 'Bahasa Inggris',
            'semester' => 1,
            'sks' => 3,
        ]);

        MkModel::create([
            'kodemk' => '410100004',
            'namamk' => 'Bahasa Pemrograman',
            'semester' => 2,
            'sks' => 3,
        ]);

        MkModel::create([
            'kodemk' => '410100005',
            'namamk' => 'Pemrograman Basis Data',
            'semester' => 3,
            'sks' => 3,
        ]);

        MkModel::create([
            'kodemk' => '410100006',
            'namamk' => 'Data Warehouse',
            'semester' => 5,
            'sks' => 2,
        ]);

        MkModel::create([
            'kodemk' => '410100007',
            'namamk' => 'Testing dan Implementasi',
            'semester' => 5,
            'sks' => 3,
        ]);

        MkModel::create([
            'kodemk' => '410100008',
            'namamk' => 'Manajemen Proyek',
            'semester' => 6,
            'sks' => 3,
        ]);

        MkModel::create([
            'kodemk' => '410100009',
            'namamk' => 'Proyek Rekayasa Perangkat Lunak',
            'semester' => 7,
            'sks' => 3,
        ]);

        MkModel::create([
            'kodemk' => '410100010',
            'namamk' => 'Sistem Pendukung Keputusan',
            'semester' => 7,
            'sks' => 3,
        ]);
    }
}
