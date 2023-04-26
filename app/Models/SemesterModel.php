<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterModel extends Model
{
    protected $table = "semester";

    protected $fillable = [
        'thn', 'smt', 'status'
    ];
}
