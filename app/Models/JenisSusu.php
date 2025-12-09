<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSusu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jenis_susu',
        // 'harga_tambahan', // <--- Dihapus
        'stok',
    ];
}
