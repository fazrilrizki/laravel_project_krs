<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkModel extends Model
{
    protected $table = "mk";

    protected $fillable = [
        'kodemk', 'namamk', 'semester', 'sks'
    ];
}
