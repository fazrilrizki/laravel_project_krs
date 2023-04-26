<?php

namespace Database\Seeders;

use App\Models\krsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class krsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        krsModel::create([
            'nim' => '13410100001',
            'kodemk' => '410100001',
            'thn' => '2013/2014',
            'smt' => 'Gasal',
            'kelas' => 'A'
        ]);
    }
}
