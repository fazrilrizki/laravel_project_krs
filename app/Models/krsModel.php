<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class krsModel extends Model
{
    protected $table = "krs";

    protected $fillable = [
        'nim', 'kodemk', 'thn', 'smt', 'kelas'
    ];

    // public function allData()
    // {
    //     return DB::table('krs')
    //         ->join('mk', 'kodemk', '=', 'mk.kodemk')
    //         ->get();
    // }
}
