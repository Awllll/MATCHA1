<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepekatanMatcha extends Model
{
    use HasFactory;

    protected $table = 'kepekatan_matchas'; 

    protected $fillable = [
        'nama_kepekatan',
        'stok',
    ];
}
