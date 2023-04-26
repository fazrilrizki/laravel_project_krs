<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mhs";

    protected $fillable = [
        'nim', 'nama', 'email', 'password', 'status'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
