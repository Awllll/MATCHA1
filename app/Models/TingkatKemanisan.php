<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatKemanisan extends Model
{
    use HasFactory;

    protected $table = 'tingkat_kemanisans';

    protected $fillable = [
        'nama_tingkat',
    ];
}
