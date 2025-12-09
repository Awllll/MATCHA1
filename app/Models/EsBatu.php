<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsBatu extends Model
{
    use HasFactory;

    protected $table = 'es_batus';

    protected $fillable = [
        'nama_es',
    ];
}
