<?php

namespace Database\Seeders;

use App\Models\SemesterModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        SemesterModel::create([
            'thn' => '2013/2014',
            'smt' => 'Gasal',
            'status' => 'AKTIF',
        ]);
    }
}
