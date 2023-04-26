<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaInsert extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::create([
            'nim' => '13410100001',
            'nama' => 'Surti',
            'pin' => '123456',
            'status' => 'PASIF'
        ]);

        Mahasiswa::create([
            'nim' => '13410100002',
            'nama' => 'Sutejo',
            'pin' => '654321',
            'status' => 'PASIF'
        ]);

        Mahasiswa::create([
            'nim' => '13410100003',
            'nama' => 'Pamela',
            'pin' => '111111',
            'status' => 'PASIF'
        ]);
    }
}
